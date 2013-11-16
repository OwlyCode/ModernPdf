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

class StreamRepresentation
{
    protected $object;

    public function __construct(\ModernPdf\Model\Object\Stream $object)
    {
        $this->object = $object;
    }

    public function render()
    {
        $objectNumber = $this->object->getObjectNumber();
        $generationNumber = $this->object->getGenerationNumber();

        $output  = $objectNumber." ".$generationNumber." obj\n";
        $output .="<< >>\n";
        $output .="stream\n";
        $output .="1. 0. 0. 1. 50. 700. cm\n";
        $output .="BT\n";
        $output .="/F0 36. Tf\n";
        $output .="(Hello, World, this is so cool !) Tj\n";
        $output .="ET\n";
        $output .="endstream\n";
        $output .="endobj\n";

        return $output;
    }
}
