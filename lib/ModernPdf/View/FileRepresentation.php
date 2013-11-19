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

    public function __construct(\ModernPdf\Component\FileStructure\File $file)
    {
        $this->file = $file;
    }

    /**
     * Render the header part of the file.
     *
     * @return string The header as a string.
     */
    public function renderHeader()
    {
        $header  = '%PDF-' . $this->file->getVersion()."\r\n";
        $header .= '%âãÏÓ'."\r\n"; // Characters codes over 127
        return $header;
    }

    /**
     * Prepare the body to be rendered.
     *
     * @return array The body, one object per array line.
     */
    public function prepareBody()
    {
        $body = array();

        // Body
        foreach ($this->file->getObjects() as $object) {
            $outputer = new Object\ObjectRepresentation($object);
            $body[] = $outputer->render();
        }

        return $body;
    }

    /**
     * Renders the prepared body.
     *
     * @param  array $body The body as an array (one object per line).
     *
     * @return string The ready to output body.
     */
    public function renderBody($body)
    {
        return implode('', $body);
    }

    /**
     * Renders the cross reference table.
     *
     * @param  array   $rawBody    The body as an array. See prepareBody().
     * @param  integer $byteOffset The offset in bytes of the table. Usualy the header length.
     *
     * @return string The cross reference table.
     */
    public function renderCrossReferenceTable($rawBody, $byteOffset)
    {
        $crossReferenceGenerator = new CrossReferenceGenerator();
        $crossReferenceTable = $crossReferenceGenerator->generate($rawBody, $byteOffset);

        return $crossReferenceTable;
    }

    /**
     * Renders the trailer.
     *
     * @param  integer $byteOffset The byte offset for the startxref entry. Usualy the header+body length.
     *
     * @return string The trailer.
     */
    public function renderTrailer($byteOffset)
    {
        $trailer  = 'trailer'."\r\n";
        $trailer .= $this->file->getTrailerDictionary();
        $trailer .= 'startxref'."\r\n";
        $trailer .= $byteOffset."\r\n";
        $trailer .= '%%EOF';

        return $trailer;
    }

    /**
     * Renders the whole file.
     *
     * @return string The pdf file ready to display.
     */
    public function render()
    {
        // Header
        $header  = $this->renderHeader();

        // Body
        $rawBody = $this->prepareBody(); // The cross reference table needs it.
        $body = $this->renderBody($rawBody);

        // Cross reference table
        $crossReferenceTable = $this->renderCrossReferenceTable($rawBody, strlen($header));

        // Trailer
        $trailer  = $this->renderTrailer(strlen($header.$body));

        return $header.$body.$crossReferenceTable.$trailer;
    }
}
