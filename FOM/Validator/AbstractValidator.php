<?php

namespace FOM\Validator;

/**
 * Class AbstractValidator
 * @package FOM\Validator
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}