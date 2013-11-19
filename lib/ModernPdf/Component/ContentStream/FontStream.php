<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ContentStream
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ContentStream;

use \ModernPdf\Component\ObjectType;

class FontStream extends ObjectType\PdfStream
{
    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
    }

    /**
     * (Required for Type 1 and TrueType fonts) The length in bytes of the clear-text
     * portion of the Type 1 font program, or the entire TrueType font program, after it has
     * been decoded using the filters specified by the stream’s Filter entry, if any.
     *
     * @param integer $length1 The length1 to set.
     */
    public function setLength1($length1)
    {
        $this->dictionary['Length1'] = $length1;
    }

    /**
     * (Required for Type 1 fonts) The length in bytes of the encrypted portion of the Type
     * 1 font program after it has been decoded using the filters specified by the stream’s
     * Filter entry.
     *
     * @param integer $length2 The length2 to set.
     */
    public function setLength2($length2)
    {
        $this->dictionary['Length2'] = $length2;
    }

    /**
     * (Required for Type 1 fonts) The length in bytes of the fixed-content portion of the
     * Type 1 font program after it has been decoded using the filters specified by the
     * stream’s Filter entry. If Length3 is 0, it indicates that the 512 zeros and
     * cleartomark have not been included in the FontFile font program and shall be
     * added by the conforming reader.
     *
     * @param integer $length3 The length3 to set.
     */
    public function setLength3($length3)
    {
        $this->dictionary['Length3'] = $length3;
    }

    /**
     * (Required if referenced from FontFile3; PDF 1.2) A name specifying the format of
     * the embedded font program. The name shall be Type1C for Type 1 compact fonts,
     * CIDFontType0C for Type 0 compact CIDFonts, or OpenType for OpenType fonts.
     *
     * @param Type\PdfName $subtype The sub type to set.
     */
    public function setSubtype(Type\PdfName $subtype)
    {
        $this->dictionary['Subtype'] = $subtype;
    }

    /**
     * Optional; PDF 1.4) A metadata stream containing metadata for the embedded
     * font program.
     *
     * @param Type\PdfIndirectReference $metadata The indirect reference to the metadata stream.
     */
    public function setMetadata(Type\PdfIndirectReference $metadata)
    {
        $this->dictionary['Metadata'] = $metadata;
    }
}
