<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ObjectType
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ObjectType;

/**
 * Represents a graphic stream.
 */
class PdfStream
{
    protected $data = array();
    protected $dictionary;

    /**
     * @see Object::__construct()
     */
    public function __construct()
    {
        $this->dictionary = new PdfDictionary();
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Stream";
    }

    /**
     * Returns the lines in the stream as an array.
     *
     * @return array The stream lines.
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Returns the lines in the stream as a string.
     *
     * @return string The stream data.
     */
    public function getRaw()
    {
        return implode("\r\n", $this->data);
    }

    /**
     * Adds a new line to the stream and updates its length.
     *
     * example: $stream->push('1 0 0 1 100 100 cm');
     *
     * @param  string $data The line to add.
     */
    public function push($data)
    {
        $this->data[] = $data;
        $this->dictionary['Length'] = strlen($this->getRaw());
    }

    /**
     * Sets the filter needed to decode the stream.
     *
     * @param Type\PdfName $filter The filter name.
     */
    public function setFilter(Type\PdfName $filter)
    {
        $this->dictionary['Filter'] = $filter;
    }

    public function __toString()
    {
        $output  = $this->dictionary."\r\n";
        $output .= "stream\r\n";
        $output .= $this->getRaw()."\r\n";
        $output .= "endstream";

        return $output;
    }

    /**
     * @todo
     * DecodeParms
     * F
     * FFilter
     * FDecodeParms
     * DL
     */
}
