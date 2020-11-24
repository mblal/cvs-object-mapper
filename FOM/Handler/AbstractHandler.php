<?php

namespace FOM\Handler;

use FOM\Formatter\FormatterInterface;
use FOM\Reader\ReaderInterface;
use FOM\Writer\WriterInterface;

/**
 * Class AbstractHandler
 * @package FOM\Handler
 */
abstract class AbstractHandler implements ReaderHandlerInterface, WriterHandlerInterface
{

    /**
     * @var FOM\Formatter\FormatterInterface
     */
    protected $formatter = null;

    /**
     * @var FOM\Reader\ReaderInterface
     */
    protected $reader = null;

    /**
     * @var FOM\Writer\WriterInterface
     */
    protected $writer = null;

    /**
     * @return FOM\Formatter\FormatterInterface
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param FOM\Formatter\FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @return ReaderInterface
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * @param FOM\Reader\ReaderInterface $reader
     */
    public function setReader(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return WriterInterface
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * 
     * {@inheritDoc}
     * @see FOM\Handler\WriterHandlerInterface::setWriter()
     */
    public function setWriter(WriterInterface $writer)
    {
        $this->writer = $writer;
    }
}