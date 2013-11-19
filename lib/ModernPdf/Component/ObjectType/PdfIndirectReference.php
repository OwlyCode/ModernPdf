<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ObjectType
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ObjectType;

use ModernPdf\Component\FileStructure;

class PdfIndirectReference
{
    protected $value;

    public function __construct(FileStructure\Object $object)
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
