<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\ICC;

use \ModernPdf\Model\Type;
use \ModernPdf\Model\Object;

/**
 * Represents a graphic stream.
 */
class IccProfile extends Object\Stream
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['N'] = 3; // 3 by default. (RGB)
    }

    /**
     * Sets the colour components amount.
     *
     * (Required) The number of colour components in the colour space described 
     * by the ICC profile data. This number shall match the number of components 
     * actually in the ICC profile. N shall be 1, 3, or 4.
     *
     * @param Type\PdfName $components The colour components amount.
     */
    public function setColourComponents($components)
    {
        $this->baseType['N'] = $components;
    }
}
