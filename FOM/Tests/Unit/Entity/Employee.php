<?php


namespace FOM\Tests\Unit\Entity;

use FOM\Annotation\Dependency;
use FOM\Tests\Unit\Entity\School;

class Employee
{
    /**
     * @var string
     */
    public $firstname;
    /**
     * @var string
     */
    public $lastname;
    /**
     * @var int
     */
    public $age;
    /**
     * @var string
     */
    public $degree;
    /**
     * @var string
     */
    public $job;

    /**
     * @var School
     * @Dependency (class="FOM\Tests\Unit\Entity\School")
     */
    public $school;
    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @param string $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }
}