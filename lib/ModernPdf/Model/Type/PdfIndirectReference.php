<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Type
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Type;

class PdfIndirectReference
{
    protected $value;

    public function __construct(\ModernPdf\Model\Object\Object $object)
    {
        $this->object = $object;
    }

    public function getObject()
    {
        return $this->object;
    }

    public function __toString()
    {
        return $this->object->getObjectNumber().' '.$this->object->getGenerationNumber().' R';
    }
}
