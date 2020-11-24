<?php

namespace FOM\Handler;


use FOM\Writer\WriterInterface;

/**
 * Interface WriterHandlerInterface
 * @package Common\ToolsBundle\Service\Parser\Handler
 */
interface WriterHandlerInterface {

    /**
     * @param string $filename
     *
     * @return mixed
     */
    public function toFile($filename, $data);

    /**
     * @param FOM\Writer\WriterInterface $writer
     */
    public function setWriter(WriterInterface $writer);

    /**
     * @return FOM\Writer\WriterInterface
     */
    public function getWriter();
}