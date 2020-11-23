<?php


namespace MBL\CSVRWBundle\Tests\Util;


class Reflector
{
    public static function setValue($class, $property, $value)
    {
        $reflectionProperty = new \ReflectionProperty(get_class($class), $property);
        $reflectionProperty->setAccessible(true);
        return $reflectionProperty->setValue($class, $value);
    }

    public static function getValue($class, $property)
    {
        $reflectionProperty = new \ReflectionProperty(get_class($class), $property);
        $reflectionProperty->setAccessible(true);
        return $reflectionProperty->getValue($class);
    }

}