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
 * Represents an Outline Dictionary.
 */
class OutlineDictionary extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "OutlineDictionary";
    }

    /**
     * Returns the title.
     *
     * @return Type\PdfIndirectReference The title to display.
     */
    public function getTitle()
    {
        return $this->baseType['Title'];
    }

    /**
     * Sets the title.
     *
     * @param Type\PdfString $title The title to display.
     */
    public function setTitle(Type\PdfString $title)
    {
        $this->baseType['Title'] = $title;
    }

    /**
     * Returns the parent outline dictionary.
     *
     * @return Type\PdfIndirectReference The parent outlines indirect reference.
     */
    public function getParent()
    {
        return $this->baseType['Parent'];
    }

    /**
     * Sets the parent outline dictionary.
     *
     * @param Type\PdfIndirectReference $parent The parent outlines indirect reference.
     */
    public function setParent(Type\PdfIndirectReference $parent)
    {
        $this->baseType['Parent'] = $parent;
    }

    /**
     * Returns the prev outline dictionary.
     *
     * @return Type\PdfIndirectReference The prev outlines indirect reference.
     */
    public function getPrev()
    {
        return $this->baseType['Prev'];
    }

    /**
     * Sets the prev outline dictionary.
     *
     * @param Type\PdfIndirectReference $prev The prev outlines indirect reference.
     */
    public function setPrev(Type\PdfIndirectReference $prev)
    {
        $this->baseType['Prev'] = $prev;
    }

    /**
     * Returns the next outline dictionary.
     *
     * @return Type\PdfIndirectReference The next outlines indirect reference.
     */
    public function getNext()
    {
        return $this->baseType['Next'];
    }

    /**
     * Sets the next outline dictionary.
     *
     * @param Type\PdfIndirectReference $next The next outlines indirect reference.
     */
    public function setNext(Type\PdfIndirectReference $next)
    {
        $this->baseType['Next'] = $next;
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
        $this->baseType['First'] = $first;
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
        $this->baseType['Last'] = $last;
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
        $this->baseType['Count'] = $count;
    }

    /**
     * Get the Dest.
     * 
     * The destination. Arrays are destinations, names are references to entries in
     * the /Dests entry in the document catalog, strings are references to entries
     * in the /Dests entry in the document’s name dictionary.
     *
     * @return mixed The dest.
     */
    public function getDest()
    {
        return $this->baseType['Dest'];
    }

    /**
     * Sets Dest.
     *
     * @param mixed The dest.
     */
    public function setDest($dest)
    {
        $this->baseType['Dest'] = $dest;
    }
}
