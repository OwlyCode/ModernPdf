<?php
/**
 * Resources used :
 * http://www.websupergoo.com/helppdfnet/source/4-examples/17-advancedgraphics.htm
 *
 * @category Builder
 * @package  ModernPdf\Builder\StreamWriter
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Builder\StreamWriter;

use \ModernPdf\Component\ObjectType as Type;

class Text
{
    protected $stream;

    public function __construct(&$stream)
    {
        $this->stream = $stream;
    }

    /**
     * Sets the font for the oncoming writed text on the stream.
     *
     * @param Type\PdfName $name The name of the font, as stored in the resource.
     * @param integer      $size The font size in points.
     */
    public function setFont(Type\PdfName $name, $size)
    {
        $this->stream->push($name . " " . $size . " Tf");
        return $this;
    }

    /**
     * Sets the line leading.
     *
     * @param integer $points The leading in points.
     */
    public function setLeading($points)
    {
         $this->stream->push($points . " TL");
        return $this;
    }

    /**
     * Sets the character spacing.
     *
     * @param integer $points The character spacing in points.
     */
    public function setCharacterSpacing($points)
    {
         $this->stream->push($points . " Tc");
        return $this;
    }

    /**
     * Sets the word spacing.
     *
     * @param integer $points The word spacing in points.
     */
    public function setWordSpacing($points)
    {
         $this->stream->push($points . " Tw");
        return $this;
    }

    /**
     * Sets the horizontal spacing.
     *
     * @param integer $points The horizontal spacing in points.
     */
    public function setHorizontalSpacing($points)
    {
         $this->stream->push($points . " Tz");
        return $this;
    }

    /**
     * Sets the text rise.
     *
     * @param integer $points The text rise in points.
     */
    public function setRise($points)
    {
         $this->stream->push($points . " Ts");
        return $this;
    }

    /**
     * Sets the text rendering mode.
     * You can help yourself with the constants defined in the class SteamBuilder.
     *
     * @param integer $mode The mode to use.
     */
    public function setRenderingMode($mode)
    {
         $this->stream->push($mode . " Tr");
        return $this;
    }

    /**
     * Opens a text section. It must be called before any text printing.
     */
    public function openTextSection()
    {
        $this->stream->push("BT");
        return $this;
    }

    /**
     * Closes a text section. It must be called after finishing all text printing.
     */
    public function closeTextSection()
    {
        $this->stream->push("ET");
        return $this;
    }

    /**
     * Prints some text on a line, WITHOUT new line.
     *
     * @param  Type\PdfString $text The text to print.
     */
    public function printText(Type\PdfString $text)
    {
         $this->stream->push($text.' Tj');
        return $this;
    }

    /**
     * Prints some text on a line, WITH new line.
     *
     * @param  Type\PdfString $text The text to print.
     */
    public function printLnText(Type\PdfString $text)
    {
         $this->stream->push($text.' Tj T*');
        return $this;
    }

    /**
     * Go to a new line and offsets future text.
     *
     * @param  integer $x The x axis offset.
     * @param  integer $y The y axis offset.
     */
    public function lnOffsetText($x, $y)
    {
         $this->stream->push($x.' '.$y.' Td');
        return $this;
    }

    /**
     * Go to a new line and offsets future text. Also sets the leading to the
     * opposite of the y axis offset.
     *
     * @param  integer $x The x axis offset.
     * @param  integer $y The y axis offset.
     */
    public function lnOffsetTextWithNegativeLeading($x, $y)
    {
         $this->stream->push($x.' '.$y.' TD');
        return $this;
    }

    /**
     * Resets the transformation matrix and apply a translation.
     *
     * @param integer $x The x axis translation.
     * @param integer $y The y axis translation.
     */
    public function setTranslation($x, $y)
    {
        $this->stream->push('1 0 0 1 ' . $x . ' ' . $y . ' Tm');
        return $this;
    }

    /**
     * Resets the transformation matrix and apply a scaling.
     *
     * @param integer $x The x axis scaling.
     * @param integer $y The y axis scaling.
     */
    public function setScaling($sx, $sy)
    {
        $this->stream->push($sx . ' 0 0 ' . $sy . ' 0 0 Tm');
        return $this;
    }

    /**
     * Resets the transformation matrix and apply a rotation.
     *
     * @param integer $x The rotation angle, in radians and counterclockwise.
     */
    public function setRotation($x)
    {
        $cos = round(cos($x)*100)/100;
        $sin = round(sin($x)*100)/100;

        $this->stream->push($cos . ' ' . $sin . ' ' . -$sin . ' ' . $cos . ' 0 0 Tm');
        return $this;
    }
}
