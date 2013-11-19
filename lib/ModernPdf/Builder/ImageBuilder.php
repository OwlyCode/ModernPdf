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
 * This class is responsible of loading an image from a path or a file and build
 * the associated image resource, ready to be put in the pdf document.
 */
class ImageBuilder
{
    protected $data;

    /**
     * Loads an image file from a file
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
     * Loads an image from a string.
     * @param  string $string The image data to load.
     */
    public function loadString($string)
    {
        $this->data = $string;
    }

    /**
     * Generates an image resource.
     *
     * @param integer $objectNumber     The pdf object number
     * @param integer $generationNumber The pdf generation number
     *
     * @return \ModernPdf\Component\DocumentStructure\Image\Image The image resource.
     */
    public function build()
    {
        $infos = getimagesizefromstring($this->data);

        switch ($infos['mime']) {
            case 'image/jpeg':
                $image = new \ModernPdf\Component\DocumentStructure\Image\Jpeg();
                break;
            default:
                throw new LogicException($infos['mime'].' files are not supported.');
        }

        $image->setData($this->data);

        return $image;
    }
}
