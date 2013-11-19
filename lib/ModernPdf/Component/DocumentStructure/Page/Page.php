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
 * Represents a single Page.
 */
class Page extends ObjectType\PdfDictionary
{

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Contents'] = new ObjectType\PdfArray();
        $this['Annots'] = new ObjectType\PdfArray();
        $this['MediaBox'] = new ObjectType\PdfArray(array(0, 0, 612, 792));
        $this['Type'] = new ObjectType\PdfName('Page');
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
     * Returns the associated Resource indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The resource indirect reference.
     */
    public function getResource()
    {
        return $this['Resources'];
    }

    /**
     * Sets the associated Resource indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $resource The resource indirect reference.
     */
    public function setResource(ObjectType\PdfIndirectReference $resource)
    {
        return $this['Resources'] = $resource;
    }

    /**
     * Returns the applied rotation to the page.
     *
     * @return integer The rotation applied.
     */
    public function getRotate()
    {
        return $this['Rotate'];
    }

    /**
     * Applies a rotation to the page.
     *
     * @param integer $rotate The rotation to apply, in degrees. Must be a multiple of 90.
     * @throws InvalidArgumentException If $rotate isn't a multiple of 90.
     */
    public function setRotate($rotate)
    {
        if ($rotate % 90 !== 0) {
            throw new InvalidArgumentException('Page rotate must be a multiple of 90.');
        }
        return $this['Rotate'] = $rotate;
    }

    /**
     * Returns the PdfArray used as mediabox of the page.
     *
     * @return ObjectType\PdfArray The mediabox PdfArray.
     */
    public function getMediaBox()
    {
        return $this['MediaBox'];
    }

    /**
     * Sets the mediabox of the page.
     *
     * @param ObjectType\PdfArray $mediaBox The mediabox as a PdfArray.
     */
    public function setMediabox(ObjectType\PdfArray $mediaBox)
    {
        $this['MediaBox'] = $mediaBox;
    }

    /**
     * Returns the PdfArray containing the indirect references of the contents
     * of the page.
     *
     * @return ObjectType\PdfArray The content indirect reference PdfArray.
     */
    public function getContents()
    {
        return $this['Contents'];
    }

    /**
     * Adds a content stream to the page via its indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $stream The stream indirect reference.
     */
    public function addContent(ObjectType\PdfIndirectReference $stream)
    {
        $this['Contents'][] = $stream;
    }

    /**
     * Returns the PdfArray containing the indirect references of annotations.
     *
     * @return ObjectType\PdfArray The content indirect reference PdfArray.
     */
    public function getAnnots()
    {
        return $this['Annots'];
    }

    /**
     * Adds an annotation to the page via its indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $stream The annotation indirect reference.
     */
    public function addAnnot(ObjectType\PdfIndirectReference $annot)
    {
        $this['Annots'][] = $annot;
    }
}
