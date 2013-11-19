<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Page
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Page;

use ModernPdf\Model\Resource\Font;
use ModernPdf\Model\Type;

/**
 * Represents a resource dictionary.
 */
class Resource extends Object
{

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Font'] = new Type\PdfDictionary();
        $this['XObject'] = new Type\PdfDictionary();
    }

    /**
     * Adds a font to the dictionary.
     *
     * @param string    $name The name the font will be identified with.
     * @param Font\Font $font The font object.
     */
    public function addFont($name, Type\PdfIndirectReference $font)
    {
        $this['Font'][$name] = $font;
    }

    /**
     * Adds an image to the dictionary.
     *
     * @param [type]                    $name  The name the image will be identified with.
     * @param Type\PdfIndirectReference $image The image object indirect reference.
     */
    public function addImage($name, Type\PdfIndirectReference $image)
    {
        $this['XObject'][$name] = $image;
    }
}
