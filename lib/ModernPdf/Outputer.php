<?php
/**
 * This is the main class of the library. It builds the PDF tree.
 *
 * @category Control
 * @package  ModernPdf
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf;

/**
 * The Outputer class, responsible of the output of the pdf.
 */
class Outputer
{

    protected $file;

    public function __construct()
    {
    }

    public function output(\ModernPdf\Component\FileStructure\File $file)
    {
        $view = new \ModernPdf\View\FileRepresentation($file);
        return $view->render();
    }
}
