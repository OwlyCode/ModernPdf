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

class StandardRepresentation
{
    protected $object;

    public function __construct(\ModernPdf\Model\Object\Object $object)
    {
        $this->object = $object;
    }

    public function render()
    {
        $objectNumber = $this->object->getObjectNumber();
        $generationNumber = $this->object->getGenerationNumber();

        $output  = $objectNumber." ".$generationNumber." obj\n";
        $output .= $this->object->getBaseType()."\n";
        $output .="endobj\n";

        return $output;
    }
}
