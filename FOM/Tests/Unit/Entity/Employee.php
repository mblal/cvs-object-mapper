<?php


namespace FOM\Tests\Unit\Entity;

use FOM\Annotation\Dependency;
use FOM\Tests\Unit\Entity\School;

class Employee
{
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var int
     */
    private $age;
    /**
     * @var string
     */
    private $degree;
    /**
     * @var string
     */
    private $job;

    /**
     * @var School
     * @Dependency (class="FOM\Tests\Unit\Entity\School")
     */
    private $school;
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

    /**
     * @return \FOM\Tests\Unit\Entity\School
     */
    public function getSchool(): \FOM\Tests\Unit\Entity\School
    {
        return $this->school;
    }

    /**
     * @param \FOM\Tests\Unit\Entity\School $school
     */
    public function setSchool(\FOM\Tests\Unit\Entity\School $school): void
    {
        $this->school = $school;
    }

}