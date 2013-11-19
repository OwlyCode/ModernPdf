<?php
/**
 * @category Builder
 * @package  ModernPdf\Builder
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Builder;

/**
 * This class is responsible of loading an ICC file from a path or a file and
 * build the associated ICC profile stream, ready to be put in the pdf document.
 */
class IccBuilder
{
    protected $data;

    /**
     * Loads an ICC file from a file
     * @param string $path The path to load the file from.
     */
    public function loadFile($path)
    {
        $fd = fopen($path, 'rb');
        $size = filesize($path);
        $this->data = fread($fd, $size);
        fclose($fd);
    }

    /**
     * Loads an ICC from a string.
     * @param  string $string The ICC data to load.
     */
    public function loadString($string)
    {
        $this->data = $string;
    }

    /**
     * Generates an ICC stream.
     *
     * @param integer $objectNumber     The pdf object number
     * @param integer $generationNumber The pdf generation number
     *
     * @return \ModernPdf\Model\Resource\ICC\IccProfile The ICC resource.
     */
    public function build()
    {
        $icc = new \ModernPdf\Component\ContentStream\IccProfile();
        $icc->push($this->data);

        return $icc;
    }
}
