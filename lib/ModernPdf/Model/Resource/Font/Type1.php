<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Font;

use \ModernPdf\Model\Type;
use \ModernPdf\Model\Object;

class Type1 extends Object\Object
{

    public function __construct($name, $objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Font');
        $this->baseType['BaseFont'] = new \ModernPdf\Model\Type\PdfName($name);
        $this->baseType['SubType'] = new \ModernPdf\Model\Type\PdfName("Type1");
    }

    public function getType()
    {
        return "Font";
    }

    public function setFirstChar($firstChar)
    {
        $this->baseType['FirstChar'] = $firstChar;
    }

    public function setLastChar($lastChar)
    {
        $this->baseType['LastChar'] = $lastChar;
    }

    public function setWidths(Type\PdfIndirectReference $widths)
    {
        $this->baseType['Widths'] = $widths;
    }

    public function setFontDescriptor(Type\PdfIndirectReference $descriptor)
    {
        $this->baseType['FontDescriptor'] = $descriptor;
    }

    public function setEncoding($encoding)
    {
        $this->baseType['Encoding'] = $encoding; // name or Encoding dictionary.
    }

    public function setToUnicode(Object\Stream $stream)
    {
        $this->baseType['ToUnicode'] = $stream;
    }
}
