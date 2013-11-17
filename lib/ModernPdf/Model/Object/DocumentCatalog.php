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
 * Represents the document catalog dictionary.
 */
class DocumentCatalog extends Object
{
    /**
     * @see Object::getType()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Catalog');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "DocumentCatalog";
    }

    /**
     * Sets the page tree indirect reference.
     *
     * @param Type\PdfIndirectReference $pageTree The indirect reference to the page tree.
     */
    public function setPageTree(Type\PdfIndirectReference $pageTree)
    {
        return $this->baseType['Pages'] = $pageTree;
    }

    /**
     * Returns the page tree indirect reference.
     *
     * @return Type\PdfIndirectReference The page tree indirect reference.
     */
    public function getPageTree()
    {
        return $this->baseType['Pages'];
    }

    // @todo PageLabels
    // @todo Names
    // @todo Dests
    // @todo ViewerPreferences
    // @todo PageLayout
    // @todo PageMode
    // @todo Outlines
    // @todo Metadata
}
