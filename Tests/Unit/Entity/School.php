<?php


namespace MBL\CSVRWBundle\Tests\Unit\Entity;
use MBL\CSVRWBundle\Tests\Unit\Entity\Address;
use MBL\CSVRWBundle\Annotation\Dependency;

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
     * @Dependency(class="MBL\CSVRWBundle\Tests\Unit\Entity\Address")
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