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
 * Represents an Outline Dictionary.
 */
class OutlineDictionary extends ObjectType\PdfDictionary
{
    public function __construct($values = array())
    {
        parent::__construct($values);
    }

    /**
     * Returns the title.
     *
     * @return ObjectType\PdfIndirectReference The title to display.
     */
    public function getTitle()
    {
        return $this['Title'];
    }

    /**
     * Sets the title.
     *
     * @param ObjectType\PdfString $title The title to display.
     */
    public function setTitle(ObjectType\PdfString $title)
    {
        $this['Title'] = $title;
    }

    /**
     * Returns the parent outline dictionary.
     *
     * @return ObjectType\PdfIndirectReference The parent outlines indirect reference.
     */
    public function getParent()
    {
        return $this['Parent'];
    }

    /**
     * Sets the parent outline dictionary.
     *
     * @param ObjectType\PdfIndirectReference $parent The parent outlines indirect reference.
     */
    public function setParent(ObjectType\PdfIndirectReference $parent)
    {
        $this['Parent'] = $parent;
    }

    /**
     * Returns the prev outline dictionary.
     *
     * @return ObjectType\PdfIndirectReference The prev outlines indirect reference.
     */
    public function getPrev()
    {
        return $this['Prev'];
    }

    /**
     * Sets the prev outline dictionary.
     *
     * @param ObjectType\PdfIndirectReference $prev The prev outlines indirect reference.
     */
    public function setPrev(ObjectType\PdfIndirectReference $prev)
    {
        $this['Prev'] = $prev;
    }

    /**
     * Returns the next outline dictionary.
     *
     * @return ObjectType\PdfIndirectReference The next outlines indirect reference.
     */
    public function getNext()
    {
        return $this['Next'];
    }

    /**
     * Sets the next outline dictionary.
     *
     * @param ObjectType\PdfIndirectReference $next The next outlines indirect reference.
     */
    public function setNext(ObjectType\PdfIndirectReference $next)
    {
        $this['Next'] = $next;
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
        $this['First'] = $first;
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
        $this['Last'] = $last;
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
        $this['Count'] = $count;
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
        return $this['Dest'];
    }

    /**
     * Sets Dest.
     *
     * @param mixed The dest.
     */
    public function setDest($dest)
    {
        $this['Dest'] = $dest;
    }
}
