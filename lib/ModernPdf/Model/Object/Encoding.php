<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

use \ModernPdf\Model\Type;

class Encoding extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        parent::__construct($objectNumber, $generationNumber);
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        $this->baseType['Type'] = new \ModernPdf\Model\Type\PdfName('Encoding');
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "Encoding";
    }

    /**
     * Sets the base encoding.
     *
     * (Optional) The base encoding—that is, the encoding from which the
     * Differences entry (if present) describes differences— shall be the name
     * of one of the predefined encodings MacRomanEncoding, MacExpertEncoding,
     * or WinAnsiEncoding
     *
     * @param Type\PdfName $encoding The base encoding name.
     */
    public function setBaseEncoding(Type\PdfName $encoding)
    {
        $this->baseType['BaseEncoding'] = $encoding;
    }

    /**
     * Sets the encoding differences array.
     *
     * (Optional; should not be used with TrueType fonts) An array describing
     * the differences from the encoding specified by BaseEncoding or, if
     * BaseEncoding is absent, from an implicit base encoding. The Differences
     * array is described in subsequent sub-clauses.
     *
     * @param Type\PdfArray $differences The array of differences.
     */
    public function setDifferences(Type\PdfArray $differences)
    {
        $this->baseType['Differences'] = $differences;
    }
}
