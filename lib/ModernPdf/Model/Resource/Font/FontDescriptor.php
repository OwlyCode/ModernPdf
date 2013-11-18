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

class FontDescriptor extends Type\PdfDictionary
{
    public function __construct($name)
    {
        $this['Type'] = new \ModernPdf\Model\Type\PdfName('FontDescriptor');
    }

    /**
     * (Required) The PostScript name of the font. This name shall be the 
     * same as the value of BaseFont in the font or CIDFont dictionary that 
     * refers to this font descriptor. 
     *
     * @param Type\PdfName $name The name to set.
     */
    public function setFontName(Type\PdfName $name)
    {
        $this['FontName'] = $name;
    }

    /**
     * (Optional; PDF 1.5; should be used for Type 3 fonts in Tagged PDF 
     * documents) A byte string specifying the preferred font family name. 
     * EXAMPLE 1 For the font Times Bold Italic, the FontFamily is 
     * Times. 
     * 
     * @param Type\PdfString $name The font family.
     */
    public function setFontFamily(Type\PdfString $name)
    {
        $this['FontFamily'] = $name;
    }

    /**
     * (Optional; PDF 1.5; should be used for Type 3 fonts in Tagged PDF 
     * documents) The font stretch value. It shall be one of these names 
     * (ordered from narrowest to widest): UltraCondensed, 
     * ExtraCondensed, Condensed, SemiCondensed, Normal, 
     * SemiExpanded, Expanded, ExtraExpanded or UltraExpanded. 
     * 
     * @param Type\PdfName $stretch The stretch name.
     */
    public function setFontStretch(Type\PdfName $stretch)
    {
        $this['FontStretch'] = $stretch;
    }

    /**
     * (Optional; PDF 1.5; should be used for Type 3 fonts in Tagged PDF 
     * documents) The weight (thickness) component of the fully-qualified 
     * font name or font specifier. The possible values shall be 100, 200, 300, 
     * 400, 500, 600, 700, 800, or 900, where each number indicates a 
     * weight that is at least as dark as its predecessor. A value of 400 shall 
     * indicate a normal weight; 700 shall indicate bold.
     *
     * @param integer $weight The weight.
     */
    public function setFontWeight($weight)
    {
        $this['FontWeight'] = $weight;
    }

    /**
     * (Required) A collection of flags defining various characteristics of the 
     * font.
     * @param integer $flags An integer set of flags.
     */
    public function setFlags($flags)
    {
        $this['Flags'] = $flags;
    }

    /**
     * (Required, except for Type 3 fonts) A rectangle (see 7.9.5, 
     * "Rectangles"), expressed in the glyph coordinate system, that shall 
     * specify the font bounding box. This should be the smallest rectangle 
     * enclosing the shape that would result if all of the glyphs of the font 
     * were placed with their origins coincident and then filled. 
     *
     * @param Type\PdfArray $bbox A 4 values PdfArray representing the bounding box.
     * @throws InvalidArgumentException If the PDfArray is not a Rectangle (4 values).
     */
    public function setFontBBox(Type\PdfArray $bbox)
    {
        if (count($bbox) !== 4) {
            throw new \InvalidArgumentException('The FontBBox array must be a rectangle. (4 values).');
        }
        $this['FontBBox'] = $bbox;
    }

    /**
     * (Required) The angle, expressed in degrees counterclockwise from 
     * the vertical, of the dominant vertical strokes of the font. 
     * EXAMPLE 4 The 9-o’clock position is 90 degrees, and the 3-
     * o’clock position is –90 degrees. 
     * The value shall be negative for fonts that slope to the right, as almost 
     * all italic fonts do.
     *
     * @param integer $angle The angle to set.
     */
    public function setItalicAngle($angle)
    {
        $this['ItalicAngle'] = $angle;
    }

    /**
     * (Required, except for Type 3 fonts) The maximum height above the 
     * baseline reached by glyphs in this font. The height of glyphs for 
     * accented characters shall be excluded. 
     *
     * @param integer $ascent The ascent to set.
     */
    public function setAscent($ascent)
    {
        $this['Ascent'] = $ascent;
    }

    /**
     * (Required, except for Type 3 fonts) The maximum depth below the 
     * baseline reached by glyphs in this font. The value shall be a negative 
     * number.
     *
     * @param integer $descent The descent to set.
     */
    public function setDescent($descent)
    {
        $this['Descent'] = $descent;
    }

    /**
     * (Optional) The spacing between baselines of consecutive lines of text. 
     * Default value: 0. 
     *
     * @param integer $leading The leading to set.
     */
    public function setLeading($leading)
    {
        $this['Leading'] = $leading;
    }

    /**
     * (Required for fonts that have Latin characters, except for Type 3 fonts)
     * The vertical coordinate of the top of flat capital letters, measured from 
     * the baseline. 
     *
     * @param integer $capheight The cap height to set.
     */
    public function setCapHeight($capheight)
    {
        $this['CapHeight'] = $capheight;
    }

    /**
     * (Optional) The font’s x height: the vertical coordinate of the top of flat 
     * nonascending lowercase letters (like the letter x), measured from the 
     * baseline, in fonts that have Latin characters. Default value: 0. 
     *
     * @param integer $xheight The xheight to set.
     */
    public function setXHeight($xheight)
    {
        $this['XHeight'] = $xheight;
    }

    /**
     * (Required, except for Type 3 fonts) The thickness, measured 
     * horizontally, of the dominant vertical stems of glyphs in the font. 
     * 
     * @param integer $stemv The stemv to set.
     */
    public function setStemV($stemv)
    {
        $this['StemV'] = $stemv;
    }

    /**
     * (Optional) The thickness, measured vertically, of the dominant 
     * horizontal stems of glyphs in the font. Default value: 0.
     *
     * @param integer $stemh The stemh to set.
     */
    public function setStemH($stemh)
    {
        $this['StemH'] = $stemh;
    }

    /**
     * (Optional) The average width of glyphs in the font. Default value: 0.
     *
     * @param integer $avgwidth The avg width to set.
     */
    public function setAvgWidth($avgwidth)
    {
        $this['AvgWidth'] = $avgwidth;
    }

    /**
     * (Optional) The maximum width of glyphs in the font. Default value: 0.
     *
     * @param integer $maxwidth The max width to set.
     */
    public function setMaxWidth($maxwidth)
    {
        $this['MaxWidth'] = $maxwidth;
    }

    /**
     * (Optional) The width to use for character codes whose widths are not 
     * specified in a font dictionary’s Widths array. This shall have a 
     * predictable effect only if all such codes map to glyphs whose actual 
     * widths are the same as the value of the MissingWidth entry. Default 
     * value: 0.
     * 
     * @param integer $missingwidth The missing width to set.
     */
    public function setMissingWidth($missingwidth)
    {
        $this['MissingWidth'] = $missingwidth;
    }

    /**
     * (Optional) A stream containing a Type 1 font program.
     *
     * @param Object\Stream $fontfile A font file stream.
     */
    public function setFontFile(Object\Stream $fontfile)
    {
        $this['FontFile'] = $fontfile;
    }

    /**
     * (Optional; PDF 1.1) A stream containing a TrueType font program.
     *
     * @param Object\Stream $fontfile A font file stream.
     */
    public function setFontFile2(Object\Stream $fontfile)
    {
        $this['FontFile2'] = $fontfile;
    }

    /**
     * (Optional; PDF 1.2) A stream containing a font program whose format 
     * is specified by the Subtype entry in the stream dictionary
     *
     * @param Object\Stream $fontfile A font file stream.
     */
    public function setFontFile3(Object\Stream $fontfile)
    {
        $this['FontFile3'] = $fontfile;
    }

    /**
     * (Optional; meaningful only in Type 1 fonts; PDF 1.1) A string listing the 
     * character names defined in a font subset. The names in this string 
     * shall be in PDF syntax—that is, each name preceded by a slash (/). 
     * The names may appear in any order. The name .notdef shall be 
     * omitted; it shall exist in the font subset. If this entry is absent, the
     * only indication of a font subset shall be the subset tag in the FontName
     * entry.
     *
     * @param Type\PdfString $charset The charset string.
     */
    public function setCharSet(Type\PdfString $charset)
    {
        $this['CharSet'] = $charset;
    }
}
