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
 * Represents a single Page.
 */
class Page extends Object
{

    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Kids'] = new \ModernPdf\Model\Type\PdfArray();
        $this->baseType['Contents'] = new \ModernPdf\Model\Type\PdfArray();
        $this->baseType['MediaBox'] = new \ModernPdf\Model\Type\PdfArray(array(0, 0, 612, 792));
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Page');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Page";
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
     * Returns the associated Resource indirect reference.
     *
     * @return Type\PdfIndirectReference The resource indirect reference.
     */
    public function getResource()
    {
        return $this->baseType['Resources'];
    }

    /**
     * Sets the associated Resource indirect reference.
     *
     * @param Type\PdfIndirectReference $resource The resource indirect reference.
     */
    public function setResource(Type\PdfIndirectReference $resource)
    {
        return $this->baseType['Resources'] = $resource;
    }

    /**
     * Returns the applied rotation to the page.
     *
     * @return integer The rotation applied.
     */
    public function getRotate()
    {
        return $this->baseType['Rotate'];
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
        return $this->baseType['Rotate'] = $rotate;
    }

    /**
     * Returns the PdfArray used as mediabox of the page.
     *
     * @return Type\PdfArray The mediabox PdfArray.
     */
    public function getMediaBox()
    {
        return $this->baseType['MediaBox'];
    }

    /**
     * Sets the mediabox of the page.
     *
     * @param Type\PdfArray $mediaBox The mediabox as a PdfArray.
     */
    public function setMediabox(Type\PdfArray $mediaBox)
    {
        $this->baseType['MediaBox'] = $mediaBox;
    }

    /**
     * Returns the PdfArray containing the indirect references of the contents
     * of the page.
     *
     * @return Type\PdfArray The content indirect reference PdfArray.
     */
    public function getContents()
    {
        return $this->baseType['Contents'];
    }

    /**
     * Adds a content stream to the page via its indirect reference.
     *
     * @param Type\PdfIndirectReference $stream The stream indirect reference.
     */
    public function addContent(Type\PdfIndirectReference $stream)
    {
        $this->baseType['Contents'][] = $stream;
    }
}
