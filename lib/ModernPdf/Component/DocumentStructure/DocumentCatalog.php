<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure;

use \ModernPdf\Component\ObjectType;

/**
 * Represents the document catalog dictionary.
 */
class DocumentCatalog extends ObjectType\PdfDictionary
{
    /**
     * @see Object::getType()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('Catalog');
    }

    /**
     * Sets the page tree indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $pageTree The indirect reference to the page tree.
     */
    public function setPageTree(ObjectType\PdfIndirectReference $pageTree)
    {
        $this['Pages'] = $pageTree;
    }

    /**
     * Returns the page tree indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The page tree indirect reference.
     */
    public function getPageTree()
    {
        return $this['Pages'];
    }

    /**
     * Sets the metadata indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $metadata The indirect reference to the metadata.
     */
    public function setMetadata(ObjectType\PdfIndirectReference $metadata)
    {
        $this['Metadata'] = $metadata;
    }

    /**
     * Returns the metadata indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The metadata indirect reference.
     */
    public function getMetadata()
    {
        return $this['Metadata'];
    }

    /**
     * Sets the markinfo indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $markinfo The indirect reference to the markinfo.
     */
    public function setMarkInfo($bool)
    {
        $this['MarkInfo'] = new ObjectType\PdfDictionary(array(
            'Marked' => $bool ? "true" : "false"
        ));
    }

    /**
     * Returns the markinfo indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The markinfo indirect reference.
     */
    public function getMarkInfo()
    {
        return $this['MarkInfo']['Marked'];
    }

    /**
     * Adds an output intent indirect reference to the catalog.
     *
     * @param ObjectType\PdfIndirectReference $intent The OutputIntent indirect reference.
     */
    public function addOutputIntent(ObjectType\PdfIndirectReference $intent)
    {
        if (!isset($this['OutputIntents'])) {
            $this['OutputIntents'] = new ObjectType\PdfArray();
        }

        $this['OutputIntents'][] = $intent;
    }

    /**
     * Sets the outlines indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $outlines The indirect reference to the outlines.
     */
    public function setOutlines(ObjectType\PdfIndirectReference $outlines)
    {
        $this['Outlines'] = $outlines;
    }

    /**
     * Returns the outlines indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The outlines indirect reference.
     */
    public function getOutlines()
    {
        return $this['Outlines'];
    }
}
