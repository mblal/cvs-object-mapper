<?php


namespace FOM\Tests\Unit;


use FOM\Exception\RuntimeException;
use PHPUnit\Framework\TestCase;

class CsvReaderTestCase extends TestCase
{
    const FILE_NAME = '/../Fixtures/list.csv';
    const DELIMITER = ';';

    public function getFile(): \SplFileObject
    {

        try {
            $file = new \SplFileObject(__DIR__ . self::FILE_NAME);
            $file->setFlags(\SplFileObject::READ_CSV);
            $file->setCsvControl(static::DELIMITER);

            return $file;

        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
    public function getModelEntrypoint(): string
    {
        return 'FOM\Tests\Unit\Entity\Employee';
    }
}