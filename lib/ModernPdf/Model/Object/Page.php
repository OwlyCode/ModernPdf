<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class Page extends Object
{

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Kids'] = new \ModernPdf\Model\Type\PdfArray();
        $this->baseType['Contents'] = new \ModernPdf\Model\Type\PdfArray();
        $this->baseType['MediaBox'] = new \ModernPdf\Model\Type\PdfArray(array(0, 0, 612, 792));
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Page');
        parent::__construct($objectNumber, $generationNumber);
    }

    public function getParent()
    {
        return $this->baseType['Parent'];
    }

    public function setParent(\ModernPdf\Model\Type\PdfIndirectReference $parent)
    {
        return $this->baseType['Parent'] = $parent;
    }

    public function getResource()
    {
        return $this->baseType['Resources'];
    }

    public function setResource(\ModernPdf\Model\Type\PdfIndirectReference $resource)
    {
        return $this->baseType['Resources'] = $resource;
    }

    public function setMediabox(\ModernPdf\Model\Type\PdfArray $mediaBox)
    {
        $this->baseType['MediaBox'] = $mediaBox;
    }

    public function addContent(\ModernPdf\Model\Type\PdfIndirectReference $stream)
    {
        $this->baseType['Contents'][] = $stream;
    }

    public function getContents()
    {
        return $this->baseType['Contents'];
    }

    public function getMediaBox()
    {
        return $this->baseType['MediaBox'];
    }

    public function getType()
    {
        return "Page";
    }
}
