<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ContentStream
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ContentStream;

use ModernPdf\Component\FileStructure\Object;
use ModernPdf\Component\ObjectType;
use ModernPdf\Component\ObjectType\PdfIndirectReference;

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
     * @param string                      $name The name the font will be identified with.
     * @param PdfIndirectReference|Object $font The font object.
     */
    public function addFont($name, $font)
    {
        $font = $font instanceof PdfIndirectReference ? $font : new PdfIndirectReference($font);

        $this['Font'][$name] = $font;
    }

    /**
     * Adds an image to the dictionary.
     *
     * @param string                      $name  The name the image will be identified with.
     * @param PdfIndirectReference|Object $image The image object indirect reference.
     */
    public function addImage($name, $image)
    {
        $image = $image instanceof PdfIndirectReference ? $image : new PdfIndirectReference($image);

        $this['XObject'][$name] = $image;
    }
}
