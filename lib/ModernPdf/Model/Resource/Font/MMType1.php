<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Font;

class MMType1 extends Type\PdfDictionary
{
    public function __construct($name, $objectNumber, $generationNumber = 0)
    {
        parent::__construct($name, $objectNumber, $generationNumber);
        $this->baseType['SubType'] = new \ModernPdf\Model\Type\PdfName("MMType1");
    }
}
