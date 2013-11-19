<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Page
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Page;

use \ModernPdf\Component\ObjectType;

/**
 * Represents a PageTree which can hold pages.
 */
class PageTree extends ObjectType\PdfDictionary
{

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Kids'] = new ObjectType\PdfArray();
        $this['Type'] = new ObjectType\PdfName('Pages');
    }

    /**
     * Returns the parent PageTree indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The parent indirect reference.
     */
    public function getParent()
    {
        return $this['Parent'];
    }

    /**
     * Sets the parent PageTree indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $parent The parent indirect reference.
     */
    public function setParent(ObjectType\PdfIndirectReference $parent)
    {
        return $this['Parent'] = $parent;
    }

    /**
     * Return the PdfArray containing the indirect references to this PageTree kid pages.
     *
     * @return ObjectType\PdfArray The array of indirect references.
     */
    public function getKids()
    {
        return $this['Kids'];
    }

    /**
     * Adds a page indirect reference to the pagetree.
     *
     * @param ObjectType\PdfIndirectReference $kid The page indirect reference.
     */
    public function addKid(ObjectType\PdfIndirectReference $kid)
    {
        $this['Kids'][] = $kid;
        $this['Count'] = count($this->getKids());
    }
}
