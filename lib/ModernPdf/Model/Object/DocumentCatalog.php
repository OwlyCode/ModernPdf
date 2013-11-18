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
        $this->baseType['Pages'] = $pageTree;
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

    /**
     * Sets the metadata indirect reference.
     *
     * @param Type\PdfIndirectReference $metadata The indirect reference to the metadata.
     */
    public function setMetadata(Type\PdfIndirectReference $metadata)
    {
        $this->baseType['Metadata'] = $metadata;
    }

    /**
     * Returns the metadata indirect reference.
     *
     * @return Type\PdfIndirectReference The metadata indirect reference.
     */
    public function getMetadata()
    {
        return $this->baseType['Metadata'];
    }

    /**
     * Sets the markinfo indirect reference.
     *
     * @param Type\PdfIndirectReference $markinfo The indirect reference to the markinfo.
     */
    public function setMarkInfo($bool)
    {
        $this->baseType['MarkInfo'] = new Type\PdfDictionary(array(
            'Marked' => $bool ? "true" : "false"
        ));
    }

    /**
     * Returns the markinfo indirect reference.
     *
     * @return Type\PdfIndirectReference The markinfo indirect reference.
     */
    public function getMarkInfo()
    {
        return $this->baseType['MarkInfo']['Marked'];
    }

    /**
     * Adds an output intent indirect reference to the catalog.
     *
     * @param Type\PdfIndirectReference $intent The OutputIntent indirect reference.
     */
    public function addOutputIntent(Type\PdfIndirectReference $intent)
    {
        if (!isset($this->baseType['OutputIntents'])) {
            $this->baseType['OutputIntents'] = new Type\PdfArray();
        }

        $this->baseType['OutputIntents'][] = $intent;
    }

    // @todo PageLabels
    // @todo Names
    // @todo Dests
    // @todo ViewerPreferences
    // @todo PageLayout
    // @todo PageMode
    // @todo Outlines
}
