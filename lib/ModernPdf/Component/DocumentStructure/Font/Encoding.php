<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Font
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Font;

use \ModernPdf\Component\ObjectType;

class Encoding extends ObjectType\PdfDictionary
{
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('Encoding');
    }

    /**
     * Sets the base encoding.
     *
     * (Optional) The base encoding—that is, the encoding from which the
     * Differences entry (if present) describes differences— shall be the name
     * of one of the predefined encodings MacRomanEncoding, MacExpertEncoding,
     * or WinAnsiEncoding
     *
     * @param ObjectType\PdfName $encoding The base encoding name.
     */
    public function setBaseEncoding(ObjectType\PdfName $encoding)
    {
        $this['BaseEncoding'] = $encoding;
    }

    /**
     * Sets the encoding differences array.
     *
     * (Optional; should not be used with TrueType fonts) An array describing
     * the differences from the encoding specified by BaseEncoding or, if
     * BaseEncoding is absent, from an implicit base encoding. The Differences
     * array is described in subsequent sub-clauses.
     *
     * @param ObjectType\PdfArray $differences The array of differences.
     */
    public function setDifferences(ObjectType\PdfArray $differences)
    {
        $this['Differences'] = $differences;
    }
}
