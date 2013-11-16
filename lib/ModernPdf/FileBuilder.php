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
 * The FileBuilder class, responsible of building the pdf tree.
 */
class FileBuilder
{
    protected $file;

    public function __construct()
    {
        $this->file = new \ModernPdf\Model\File();
    }

    public function getFile()
    {
        return $this->file;
    }
}
