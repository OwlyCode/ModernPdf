<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

abstract class Object
{
    protected $generationNumber;
    protected $objectNumber;
    protected $baseType;

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->generationNumber = $generationNumber;
        $this->objectNumber = $objectNumber;
    }

    public function getGenerationNumber()
    {
        return $this->generationNumber;
    }

    public function getObjectNumber()
    {
        return $this->objectNumber;
    }

    public function getBaseType()
    {
        return $this->baseType;
    }

    abstract public function getType();
}
