<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

use \ModernPdf\Model\Type;

/**
 * Represents an Annotation.
 */
class Annotation extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Type'] = new Type\PdfName('Annot');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Annotation";
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @param Type\PdfArray $rect The rectangle.
     */
    public function setRect(Type\PdfArray $rect)
    {
        $this->baseType['Rect'] = $rect;
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @return Type\PdfArray The rectangle.
     */
    public function getRect()
    {
        return $this->baseType['Rect'];
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @param Type\PdfArray $backgroundColor The background color. A three value array of RGB colors between 0 and 1.
     */
    public function setBackgroundColor(Type\PdfArray $backgroundColor)
    {
        $this->baseType['C'] = $backgroundColor;
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @return Type\PdfArray The background color.
     */
    public function getBackgroundColor()
    {
        return $this->baseType['C'];
    }
}
