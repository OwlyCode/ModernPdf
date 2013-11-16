<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class DocumentCatalog extends Object
{

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Catalog');
        parent::__construct($objectNumber, $generationNumber);
    }

    public function getType()
    {
        return "DocumentCatalog";
    }

    public function setPageTree(\ModernPdf\Model\Type\PdfIndirectReference $pageTree)
    {
        return $this->baseType['Pages'] = $pageTree;
    }

    public function getPageTree()
    {
        return $this->baseType['Pages'];
    }

    // @todo
    //PageLabels
    //Names
    //Dests
    //ViewerPreferences
    //PageLayout
    //PageMode
    //Outlines
    //Metadata
}
