<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class Resource extends Object
{
    protected $baseType;

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Font'] = new \ModernPdf\Model\Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
    }

    public function getType()
    {
        return "Resource";
    }

    public function addFont($name, \ModernPdf\Model\Type\PdfDictionary $font)
    {
        $this->baseType['Font'][$name] = $font;
    }
}
