<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Outline
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Outline;

use \ModernPdf\Component\ObjectType;

/**
 * Represents a Outlines.
 */
class Outlines extends ObjectType\PdfDictionary
{
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('Outlines');
    }

    /**
     * Returns the first outline dictionary.
     *
     * @return ObjectType\PdfIndirectReference The first outline indirect reference.
     */
    public function getFirst()
    {
        return $this['First'];
    }

    /**
     * Sets the first outline dictionary.
     *
     * @param ObjectType\PdfIndirectReference $first The first outline indirect reference.
     */
    public function setFirst(ObjectType\PdfIndirectReference $first)
    {
        return $this['First'] = $first;
    }

    /**
     * Returns the last outline dictionary.
     *
     * @return ObjectType\PdfIndirectReference The last outline indirect reference.
     */
    public function getLast()
    {
        return $this['Last'];
    }

    /**
     * Sets the last outline dictionary.
     *
     * @param ObjectType\PdfIndirectReference $last The last outline indirect reference.
     */
    public function setLast(ObjectType\PdfIndirectReference $last)
    {
        return $this['Last'] = $last;
    }

    /**
     * Returns the total count of outlines.
     *
     * @return integer The count.
     */
    public function getCount()
    {
        return $this['Count'];
    }

    /**
     * Sets the total count of outlines.
     *
     * @param integer The count.
     */
    public function setCount($count)
    {
        return $this['Count'] = $count;
    }
}
