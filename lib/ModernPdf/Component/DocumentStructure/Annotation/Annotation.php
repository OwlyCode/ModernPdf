<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Annotation
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Annotation;

use \ModernPdf\Component\ObjectType;

/**
 * Represents an Annotation.
 */
class Annotation extends ObjectType\PdfDictionary
{

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('Annot');
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @param ObjectType\PdfArray $rect The rectangle.
     */
    public function setRect(ObjectType\PdfArray $rect)
    {
        $this['Rect'] = $rect;
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @return ObjectType\PdfArray The rectangle.
     */
    public function getRect()
    {
        return $this['Rect'];
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @param ObjectType\PdfArray $backgroundColor The background color. A three value array of RGB colors between 0 and 1.
     */
    public function setBackgroundColor(ObjectType\PdfArray $backgroundColor)
    {
        $this['C'] = $backgroundColor;
    }

    /**
     * The location and size of the annotation in default user space units.
     *
     * @return ObjectType\PdfArray The background color.
     */
    public function getBackgroundColor()
    {
        return $this['C'];
    }
}
