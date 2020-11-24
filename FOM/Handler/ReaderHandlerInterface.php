<?php

namespace FOM\Handler;


use FOM\Reader\ReaderInterface;

/**
 * Interface ReaderHandlerInterface
 * @package FOM\Handler
 */
interface ReaderHandlerInterface {

    /**
     * @param string $filename
     *
     * @return mixed
     */
    public function fromFile($filename);

    /**
     * @param FOM\Reader\ReaderInterface $reader
     */
    public function setReader(ReaderInterface $reader);


    /**
     * @return FOM\Reader\ReaderInterface
     */
    public function getReader();
}