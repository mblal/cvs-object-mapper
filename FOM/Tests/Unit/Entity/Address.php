<?php


namespace FOM\Tests\Unit\Entity;


class Address
{
    /**
     * @var string
     */
    private $zipCode;

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

}