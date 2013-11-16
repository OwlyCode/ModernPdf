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

namespace ModernPdf\View;

/**
 * The View\File class, rendering a File.
 */
class FileRepresentation
{
    protected $file;

    public function __construct(\ModernPdf\Model\File $file)
    {
        $this->file = $file;
        $this->crossReferenceGenerator = new CrossReferenceGenerator();
    }

    public function render()
    {
        // Header
        $header  = '%PDF-' . $this->file->getVersion()."\n";
        $header .= '%âãÏÓ'."\n"; // Characters codes over 127

        $body = array();

        // Body
        foreach ($this->file->getObjects() as $object) {
            $outputer = null;
            switch ($object->getType()) {
                case "Stream":
                    $outputer = new Object\StreamRepresentation($object);
                    break;
                default:
                    $outputer = new Object\StandardRepresentation($object);
            }
            $body[] = $outputer->render();
        }

        // Cross reference table

        $byteOffset = strlen($header);
        $crossReferenceTable = $this->crossReferenceGenerator->generate($body, $byteOffset);

        // Trailer
        $trailer  = 'trailer'."\n";
        $trailer .= '<<'."\n";
        $trailer .= '/Root 5 0 R'."\n";
        $trailer .= '/Size 6'."\n";
        $trailer .= '>>'."\n";
        $trailer .= 'startxref'."\n";
        $trailer .= strlen($crossReferenceTable.$trailer)."\n";
        $trailer .= '%%EOF';

        return $header.implode('', $body).$crossReferenceTable.$trailer;
    }
}