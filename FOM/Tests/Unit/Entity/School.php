<?php


namespace FOM\Tests\Unit\Entity;
use FOM\Tests\Unit\Entity\Address;
use FOM\Annotation\Dependency;

class School
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $category;

    /**
     * @var Address
     * @Dependency(class="FOM\Tests\Unit\Entity\Address")
     */
    public $address;

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
}