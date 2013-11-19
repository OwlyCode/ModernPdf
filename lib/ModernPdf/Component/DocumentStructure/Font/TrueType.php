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

class TrueType extends Type1
{
    public function __construct($name, $values = array())
    {
        parent::__construct($name, $values);
        $this['Subtype'] = new ObjectType\PdfName("TrueType");
    }
}
