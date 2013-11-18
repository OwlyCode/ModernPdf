<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Font;

class TrueType extends Type\PdfDictionary
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this['SubType'] = "TrueType";
    }
}
