<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

use ModernPdf\Model\Resource\Font;
use ModernPdf\Model\Type;

/**
 * Represents a resource dictionary.
 */
class Resource extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Font'] = new Type\PdfDictionary();
        $this->baseType['XObject'] = new Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
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
    public function addFont($name, Type\PdfDictionary $font)
    {
        $this->baseType['Font'][$name] = $font;
    }

    /**
     * Adds an image to the dictionary.
     *
     * @param [type]                    $name  The name the image will be identified with.
     * @param Type\PdfIndirectReference $image The image object indirect reference.
     */
    public function addImage($name, Type\PdfIndirectReference $image)
    {
        $this->baseType['XObject'][$name] = $image;
    }
}
