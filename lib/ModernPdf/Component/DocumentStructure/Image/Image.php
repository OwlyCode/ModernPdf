<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Image
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Image;

use \ModernPdf\Component\ObjectType;

abstract class Image extends \ModernPdf\Component\DocumentStructure\XObject
{
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this->dictionary['Subtype'] = new ObjectType\PdfName('Image');
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
