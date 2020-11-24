<?php

namespace FOM\Validator;

/**
 * Interface ValidatorInterface
 * @package FOM\Validator;
 */
interface ValidatorInterface {

    /**
     * @param $value
     *
     * @return mixed
     */
    public function isValid($value);

    /**
     * @return mixed
     */
    public function getErrors();

}