<?php


namespace FOM\Tests\Unit\Entity;
use FOM\Tests\Unit\Entity\Address;
use FOM\Annotation\Dependency;

class School
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $category;

    /**
     * @var Address
     * @Dependency(class="FOM\Tests\Unit\Entity\Address")
     */
    private $address;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return \FOM\Tests\Unit\Entity\Address
     */
    public function getAddress(): \FOM\Tests\Unit\Entity\Address
    {
        return $this->address;
    }

    /**
     * @param \FOM\Tests\Unit\Entity\Address $address
     */
    public function setAddress(\FOM\Tests\Unit\Entity\Address $address): void
    {
        $this->address = $address;
    }

}