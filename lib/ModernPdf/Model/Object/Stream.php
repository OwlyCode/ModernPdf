<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

/**
 * Represents a graphic stream.
 */
class Stream extends Object
{
    protected $data = array();

    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
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
        $this->baseType['Length'] = strlen($this->getRaw());
    }

    /**
     * Sets the filter needed to decode the stream.
     *
     * @param Type\PdfName $filter The filter name.
     */
    public function setFilter(Type\PdfName $filter)
    {
        $this->baseType['Filter'] = $filter;
    }
}
