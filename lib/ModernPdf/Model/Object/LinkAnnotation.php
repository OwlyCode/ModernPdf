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
 * Represents a LinkAnnotation.
 */
class LinkAnnotation extends Annotation
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType['Subtype'] = new Type\PdfName('Link');
    }

    /**
     * The destination of the link.
     *
     * @param Type\PdfString $dest The dest.
     */
    public function setDest(Type\PdfDestination $dest)
    {
        $this->baseType['Dest'] = $dest;
    }

    /**
     * The destination of the link.
     *
     * @return Type\PdfString The dest.
     */
    public function getDest()
    {
        return $this->baseType['Dest'];
    }
}
