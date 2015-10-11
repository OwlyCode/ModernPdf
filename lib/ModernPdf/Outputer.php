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

use ModernPdf\Component\FileStructure\File;
use ModernPdf\View\FileRepresentation;

/**
 * The Outputer class, responsible of the output of the pdf.
 */
class Outputer
{
    /**
     * @param File $file
     *
     * @return string
     */
    public function output(File $file)
    {
        $view = new FileRepresentation($file);

        return $view->render();
    }
}
