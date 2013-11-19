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
 * Represents a TextAnnotation.
 */
class TextAnnotation extends Annotation
{
    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Subtype'] = new ObjectType\PdfName('Text');
    }

    /**
     * The textual content of this annotation, or if none, an alternate
     * human-readable description.
     *
     * @param ObjectType\PdfString $text The text.
     */
    public function setContents(ObjectType\PdfString $text)
    {
        $this['Contents'] = $text;
    }

    /**
     * The textual content of this annotation, or if none, an alternate
     * human-readable description.
     *
     * @return ObjectType\PdfString The text.
     */
    public function getContents()
    {
        return $this['Contents'];
    }
}
