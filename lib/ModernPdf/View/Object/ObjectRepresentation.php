<?php
/**
 * This is the main class of the library. It builds the PDF tree.
 *
 * @category Model
 * @package  ModernPdf\Model
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\View\Object;

class ObjectRepresentation
{
    protected $object;

    public function __construct(\ModernPdf\Component\FileStructure\Object $object)
    {
        $this->object = $object;
    }

    public function render()
    {
        $objectNumber = $this->object->getObjectNumber();
        $generationNumber = $this->object->getGenerationNumber();

        $output  = $objectNumber." ".$generationNumber." obj\r\n";
        $output .= $this->object->getBaseType()."\r\n";
        $output .="endobj\r\n";

        return $output;
    }
}
