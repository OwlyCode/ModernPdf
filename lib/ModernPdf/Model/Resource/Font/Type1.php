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

class Type1 extends Type\PdfDictionary
{
    public function __construct($name)
    {
        $this['Type'] = new \ModernPdf\Model\Type\PdfName('Font');
        $this['BaseFont'] = new \ModernPdf\Model\Type\PdfName($name);
        $this['SubType'] = "Type1";
    }

    public function setFirstChar($firstChar)
    {
        $this['FirstChar'] = $firstChar;
    }

    public function setLastChar($lastChar)
    {
        $this['LastChar'] = $lastChar;
    }

    public function setWidths(Type\PdfIndirectReference $widths)
    {
        $this['Widths'] = $widths;
    }

    public function setFontDescriptor(FontDescriptor $descriptor)
    {
        $this['FontDescriptor'] = $descriptor;
    }

    public function setEncoding(mixed $encoding)
    {
        $this['Encoding'] = $encoding; // name or Encoding dictionary.
    }

    public function setToUnicode(Object\Stream $stream)
    {
        $this['ToUnicode'] = $stream;
    }
}
