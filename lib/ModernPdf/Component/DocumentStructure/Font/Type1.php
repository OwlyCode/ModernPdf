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

class Type1 extends ObjectType\PdfDictionary
{

    public function __construct($name, $values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('Font');
        $this['BaseFont'] = new ObjectType\PdfName($name);
        $this['Subtype'] = new ObjectType\PdfName("Type1");
    }

    public function setFirstChar($firstChar)
    {
        $this['FirstChar'] = $firstChar;
    }

    public function setLastChar($lastChar)
    {
        $this['LastChar'] = $lastChar;
    }

    public function setWidths(ObjectType\PdfIndirectReference $widths)
    {
        $this['Widths'] = $widths;
    }

    public function setFontDescriptor(ObjectType\PdfIndirectReference $descriptor)
    {
        $this['FontDescriptor'] = $descriptor;
    }

    public function setEncoding($encoding)
    {
        $this['Encoding'] = $encoding; // name or Encoding dictionary.
    }

    public function setToUnicode(Object\Stream $stream)
    {
        $this['ToUnicode'] = $stream;
    }
}
