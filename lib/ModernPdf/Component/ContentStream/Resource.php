<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ContentStream
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ContentStream;

use ModernPdf\Component\ObjectType;

/**
 * Represents a resource dictionary.
 */
class Resource extends ObjectType\PdfDictionary
{
    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Font'] = new ObjectType\PdfDictionary();
        $this['XObject'] = new ObjectType\PdfDictionary();
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Resource";
    }

    /**
     * Adds a font to the dictionary.
     *
     * @param string    $name The name the font will be identified with.
     * @param Font\Font $font The font object.
     */
    public function addFont($name, ObjectType\PdfIndirectReference $font)
    {
        $this['Font'][$name] = $font;
    }

    /**
     * Adds an image to the dictionary.
     *
     * @param [type]                    $name  The name the image will be identified with.
     * @param ObjectType\PdfIndirectReference $image The image object indirect reference.
     */
    public function addImage($name, ObjectType\PdfIndirectReference $image)
    {
        $this['XObject'][$name] = $image;
    }
}
