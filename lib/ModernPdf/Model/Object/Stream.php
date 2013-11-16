<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

class Stream extends Object
{
    protected $data = array();

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getRaw()
    {
        return implode("\n", $this->data);
    }

    public function getType()
    {
        return "Stream";
    }

    public function push($data)
    {
        $this->data[] = $data;
        $this->baseType['Length'] = strlen($this->getRaw());
    }
}
