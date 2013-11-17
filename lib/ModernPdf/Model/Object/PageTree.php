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
 * Represents a PageTree which can hold pages.
 */
class PageTree extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Kids'] = new Type\PdfArray();
        $this->baseType['Type'] = new Type\PdfName('Pages');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "PageTree";
    }

    /**
     * Returns the parent PageTree indirect reference.
     *
     * @return Type\PdfIndirectReference The parent indirect reference.
     */
    public function getParent()
    {
        return $this->baseType['Parent'];
    }

    /**
     * Sets the parent PageTree indirect reference.
     *
     * @param Type\PdfIndirectReference $parent The parent indirect reference.
     */
    public function setParent(Type\PdfIndirectReference $parent)
    {
        return $this->baseType['Parent'] = $parent;
    }

    /**
     * Return the PdfArray containing the indirect references to this PageTree kid pages.
     *
     * @return Type\PdfArray The array of indirect references.
     */
    public function getKids()
    {
        return $this->baseType['Kids'];
    }

    /**
     * Adds a page indirect reference to the pagetree.
     *
     * @param Type\PdfIndirectReference $kid The page indirect reference.
     */
    public function addKid(Type\PdfIndirectReference $kid)
    {
        $parent = new Type\PdfIndirectReference($this);
        $this->baseType['Kids'][] = $kid;
        $this->baseType['Count'] = count($this->getKids());
        $kid->getObject()->setParent($parent);
    }
}
