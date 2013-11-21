<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Font
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Font;

use \ModernPdf\Component\ObjectType;

class MMType1 extends ObjectType\PdfDictionary
{
    public function __construct($name, $objectNumber, $generationNumber = 0)
    {
        parent::__construct($name, $objectNumber, $generationNumber);
        $this->baseType['SubType'] = new \ModernPdf\Model\Type\PdfName("MMType1");
    }
}
