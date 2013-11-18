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
 * Represents a Outlines.
 */
class Outlines extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Type'] = new Type\PdfName('Outlines');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Outlines";
    }

    /**
     * Returns the first outline dictionary.
     *
     * @return Type\PdfIndirectReference The first outline indirect reference.
     */
    public function getFirst()
    {
        return $this->baseType['First'];
    }

    /**
     * Sets the first outline dictionary.
     *
     * @param Type\PdfIndirectReference $first The first outline indirect reference.
     */
    public function setFirst(Type\PdfIndirectReference $first)
    {
        return $this->baseType['First'] = $first;
    }

    /**
     * Returns the last outline dictionary.
     *
     * @return Type\PdfIndirectReference The last outline indirect reference.
     */
    public function getLast()
    {
        return $this->baseType['Last'];
    }

    /**
     * Sets the last outline dictionary.
     *
     * @param Type\PdfIndirectReference $last The last outline indirect reference.
     */
    public function setLast(Type\PdfIndirectReference $last)
    {
        return $this->baseType['Last'] = $last;
    }

    /**
     * Returns the total count of outlines.
     *
     * @return integer The count.
     */
    public function getCount()
    {
        return $this->baseType['Count'];
    }

    /**
     * Sets the total count of outlines.
     *
     * @param integer The count.
     */
    public function setCount($count)
    {
        return $this->baseType['Count'] = $count;
    }
}
