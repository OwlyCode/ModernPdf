<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Resource\Image
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Image;

abstract class Image extends \ModernPdf\Model\Object\XObject
{
    protected $baseType;
    protected $data;

    public function __construct($objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType['Subtype'] = new \ModernPdf\Model\Type\PdfName('Image');
    }

    public function getType()
    {
        return "Image";
    }

    public function getRaw()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
