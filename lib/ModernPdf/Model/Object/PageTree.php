<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class PageTree extends Object
{

    protected $baseType;

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Kids'] = new \ModernPdf\Model\Type\PdfArray();
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Pages');
        parent::__construct($objectNumber, $generationNumber);
    }

    public function getType()
    {
        return "PageTree";
    }

    public function getParent()
    {
        return $this->baseType['Parent'];
    }

    public function setParent(\ModernPdf\Model\Type\PdfIndirectReference $parent)
    {
        return $this->baseType['Parent'] = $parent;
    }

    public function getKids()
    {
        return $this->baseType['Kids'];
    }

    public function addKid(\ModernPdf\Model\Type\PdfIndirectReference $kid)
    {
        $parent = new \ModernPdf\Model\Type\PdfIndirectReference($this);
        $this->baseType['Kids'][] = $kid;
        $this->baseType['Count'] = count($this->getKids());
        $kid->getObject()->setParent($parent);
    }
}
