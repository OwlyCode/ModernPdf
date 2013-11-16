<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Font;

class Font extends \ModernPdf\Model\Type\PdfDictionary
{
    public function __construct($name, $subType)
    {
        $this['Type'] = new \ModernPdf\Model\Type\PdfName('Font');
        $this['BaseFont'] = new \ModernPdf\Model\Type\PdfName($name);
        $this['SubType'] = new \ModernPdf\Model\Type\PdfName($subType);
    }
}
