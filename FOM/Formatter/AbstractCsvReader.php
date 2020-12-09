<?php

namespace FOM\Formatter;

use Doctrine\Common\Annotations\AnnotationReader;
use FOM\Exception\RuntimeException;

/**
 * Class AbstractCsvReader
 * @package FOM\Formatter
 */
abstract class AbstractCsvReader implements FormatterInterface
{

    protected static $mainInstances = array();

    protected $annotationDefinition = 'FOM\Annotation\\Dependency';

    protected $delimiter = '.';

    /**
     * @var int
     */
    protected $totalLines = 0;

    /**
     * Get CSV Header
     * @return array
     */
    abstract public function getHeader();
    /**
     * Transform one line at the time
     *
     * @param mixed $content
     *
     * @return mixed
     */
    public function format($content)
    {
        return $content;
    }

    /**
     * Transform all the content at once
     *
     * @param Traversable $content
     *
     * @return array
     */
    public function formatBatch($content)
    {

        if (!$content instanceof \Traversable) {
            throw new RuntimeException(
                sprintf(
                    'Parameter must implement Traversable interface, %s given',
                    gettype($content)
                )
            );
        }

        $output = array();
        $csvFileHeader = array();
        foreach ($content as $key => $row) {
            if ($key == 0) {
                $csvFileHeader = $row;
                continue;
            }
            ++$this->totalLines;
            $output[] = array_combine(array_values($this->sortHeader($csvFileHeader)), $row);
        }

        return $output;
    }

    /**
     * @param $content
     * @param $targetModel
     * @return mixed
     */
    public function getObjectModel($content, $targetModel)
    {
        $annotationReader = new AnnotationReader();

        if (!$content instanceof \Traversable) {
            throw new RuntimeException(sprintf('Parameter must implement Traversable interface, %s given', gettype($content)));
        }

        $content = $this->formatBatch($content);

        foreach ($content as $key => $record) {

            static::$mainInstances[$key] = new $targetModel();

            foreach ($record as $attribute => $value) {

                $entityOfWork = new $targetModel;

                $attributes = explode($this->delimiter, $attribute);

                if (count($attributes) > 1) {

                    for ($i = 0; $i < count($attributes) - 1; $i++) {

                        $reflectionProp = new \ReflectionProperty($entityOfWork, $attributes[$i]);
                        $reflectionProp->setAccessible(true);
                        $relation = $annotationReader->getPropertyAnnotation($reflectionProp, $this->annotationDefinition);
                        $object = new $relation->class;
                        $lst[$key][$attributes[$i]] = $object;
                        $entityOfWork = $object;
                    }

                    $lst[$key][$attributes[$i]] = $value;

                    continue;
                }
                $reflectionProperty = new \ReflectionProperty(get_class(static::$mainInstances[$key]), $attribute);
                $reflectionProperty->setAccessible(true);
                $reflectionProperty->setValue(static::$mainInstances[$key], $value);
            }
        }
        $lst = $this->rawHydrator($lst);
        $this->builRelation($lst);
        return static::$mainInstances;
    }

    /**
     * @param array $list
     * @return array
     */
    protected function rawHydrator($list = array())
    {
        foreach ($list as $prentKey => $parent) {
            foreach ($parent as $childKey => $child) {
                if (is_object($child)) {
                    $reflect = new \ReflectionClass($child);
                    $vars = $reflect->getProperties();
                    $vars = $this->flatProperties($vars);
                    foreach ($vars as $k => $v) {
                        $reflectionProperty = new \ReflectionProperty(get_class($child), $k);
                        $reflectionProperty->setAccessible(true);
                        $reflectionProperty->setValue($child, $parent[$k]);
                    }
                }
            }
        }
        // TODO optimize $list structure by removing some data
        return $list;
    }

    /**
     * @param array $list
     */
    protected function builRelation($list = array())
    {
        foreach ($list as $prentKey => $parent) {
            foreach ($parent as $childKey => $child) {

                $reflectionProperty = new \ReflectionProperty(get_class(static::$mainInstances[$prentKey]), $childKey);
                $reflectionProperty->setAccessible(true);
                $reflectionProperty->setValue(static::$mainInstances[$prentKey], $child);
                break;
            }
        }
    }

    /**
     * @param $fileHeader
     * @return array
     */
    protected function sortHeader($fileHeader = array())
    {
        $sortStrategy = $this->getHeader();
        $output = array();
        foreach ($fileHeader as $item) {
            $output[$item] = $this->getHeader()[$item];
        }
        return $output;
    }

    /**
     * Get total lines
     * @return int
     */
    public function getTotalLines()
    {
        return $this->totalLines;
    }

    protected function flatProperties(array $properties): array
    {
        $output = array();
        foreach ($properties as $property){
            $output[] = $property->getName();
        }
        return array_flip($output);
    }
}