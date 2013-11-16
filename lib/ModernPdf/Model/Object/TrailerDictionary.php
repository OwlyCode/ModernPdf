<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class TrailerDictionary extends \ModernPdf\Model\Type\PdfDictionary
{

    public function __construct(\ModernPdf\Model\Type\PdfIndirectReference $documentCatalog, $crossReferenceTableSize)
    {
        parent::__construct(array(
            'Root' => $documentCatalog,
            'Size' => $crossReferenceTableSize
        ));
    }

    public function getType()
    {
        return "TrailerDictionary";
    }

    public function setInfo(\ModernPdf\Model\Type\PdfIndirectReference $documentInformation)
    {
        $this['Info'] = $documentInformation;
    }

    public function getInfo()
    {
        return $this['Info'];
    }

    public function setId(\ModernPdf\Model\Type\PdfArray $id)
    {
        if (count($id) != 2) {
            throw new InvalidArgumentException('The TrailerDictionary[ID] must be a two strings array.');
        }
        $this['ID'] = $id;
    }

    public function getId()
    {
        return $this['ID'];
    }
}
