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
 * Represents a TextAnnotation.
 */
class TextAnnotation extends Annotation
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType['Subtype'] = new Type\PdfName('Text');
    }

    /**
     * The textual content of this annotation, or if none, an alternate
     * human-readable description.
     *
     * @param Type\PdfString $text The text.
     */
    public function setContents(Type\PdfString $text)
    {
        $this->baseType['Contents'] = $text;
    }

    /**
     * The textual content of this annotation, or if none, an alternate
     * human-readable description.
     *
     * @return Type\PdfString The text.
     */
    public function getContents()
    {
        return $this->baseType['Contents'];
    }
}
