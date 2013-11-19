<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ContentStream
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ContentStream;

use \ModernPdf\Component\ObjectType;

/**
 * Represents a graphic stream.
 */
class IccProfile extends ObjectType\PdfStream
{
    /**
     * @see Object::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->dictionary['N'] = 3; // 3 by default. (RGB)
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
        $this->dictionary['N'] = $components;
    }
}
