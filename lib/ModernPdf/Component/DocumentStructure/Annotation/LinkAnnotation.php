<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Annotation
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Annotation;

use \ModernPdf\Model\Type;

/**
 * Represents a LinkAnnotation.
 */
class LinkAnnotation extends Annotation
{

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Subtype'] = new Type\PdfName('Link');
    }

    /**
     * The destination of the link.
     *
     * @param Type\PdfString $dest The dest.
     */
    public function setDest(Type\PdfDestination $dest)
    {
        $this['Dest'] = $dest;
    }

    /**
     * The destination of the link.
     *
     * @return Type\PdfString The dest.
     */
    public function getDest()
    {
        return $this['Dest'];
    }
}
