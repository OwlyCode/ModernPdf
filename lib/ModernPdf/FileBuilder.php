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

/**
 * The FileBuilder class, responsible of building the pdf tree.
 */
class FileBuilder
{
    /**
     * @var File
     */
    protected $file;

    public function __construct()
    {
        $this->file = new File();
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }
}
