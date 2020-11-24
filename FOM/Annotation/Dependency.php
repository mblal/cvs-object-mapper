<?php
namespace FOM\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @author Mohamed BLAL
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
final class Dependency extends Annotation
{

    public $class;

}