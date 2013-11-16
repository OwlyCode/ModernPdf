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

class StreamRepresentation extends ObjectRepresentation
{
    public function render()
    {
        $objectNumber = $this->object->getObjectNumber();
        $generationNumber = $this->object->getGenerationNumber();

        $output  = $objectNumber." ".$generationNumber." obj\n";
        $output .= $this->object->getBaseType()."\n";
        $output .="stream\n";
        $output .= $this->object->getRaw()."\n";
        $output .="endstream\n";
        $output .="endobj\n";

        return $output;
    }
}
