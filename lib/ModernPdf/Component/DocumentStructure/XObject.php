<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure;

use ModernPdf\Component\ObjectType;

/**
 * Represents a simple XObject with no behavior.
 */
abstract class XObject extends ObjectType\PdfStream
{
    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this->dictionary['Type'] = new ObjectType\PdfName('XObject');
    }
}
