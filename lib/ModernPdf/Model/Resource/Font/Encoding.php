<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Font;

use \ModernPdf\Model\Type;

class Encoding extends Type\PdfDictionary
{
    public function __construct()
    {
        $this['Type'] = new \ModernPdf\Model\Type\PdfName('Encoding');
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
     * @param Type\PdfArray $differences The array of differences.
     */
    public function setDifferences(Type\PdfArray $differences)
    {
        $this['Differences'] = $differences;
    }
}
