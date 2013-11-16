<?php
/**
 * Resources used :
 * http://www.websupergoo.com/helppdfnet/source/4-examples/17-advancedgraphics.htm
 *
 * @category Control
 * @package  ModernPdf\Builder\StreamWriter
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Builder\StreamWriter;

use \ModernPdf\Model\Type as Type;

class Text
{
    protected $stream;

    public function __construct(&$stream)
    {
        $this->stream = $stream;
    }

    public function setFont(Type\PdfName $name, $size)
    {
        $this->stream->push($name . " " . $size . " Tf");
        return $this;
    }

    public function setLeading($points)
    {
         $this->stream->push($points . " TL");
        return $this;
    }

    public function setCharacterSpacing($points)
    {
         $this->stream->push($points . " Tc");
        return $this;
    }

    public function setWordSpacing($points)
    {
         $this->stream->push($points . " Tw");
        return $this;
    }

    public function setHorizontalSpacing($points)
    {
         $this->stream->push($points . " Tz");
        return $this;
    }

    public function setRise($points)
    {
         $this->stream->push($points . " Ts");
        return $this;
    }

    public function setRenderingMode($mode)
    {
         $this->stream->push($mode . " Tr");
        return $this;
    }

    public function openTextSection()
    {
        $this->stream->push("BT");
        return $this;
    }

    public function closeTextSection()
    {
        $this->stream->push("ET");
        return $this;
    }

    public function printText(Type\PdfString $text)
    {
         $this->stream->push($text.' Tj');
        return $this;
    }

    public function printLnText(Type\PdfString $text)
    {
         $this->stream->push($text.' Tj T*');
        return $this;
    }

    public function lnOffsetText($x, $y)
    {
         $this->stream->push($x.' '.$y.' Td');
        return $this;
    }

    public function lnOffsetTextWithNegativeLeading($x, $y)
    {
         $this->stream->push($x.' '.$y.' TD');
        return $this;
    }

    public function setTranslation($x, $y)
    {
        $this->stream->push('1 0 0 1 ' . $x . ' ' . $y . ' Tm');
        return $this;
    }

    public function setScaling($sx, $sy)
    {
        $this->stream->push($sx . ' 0 0 ' . $sy . ' 0 0 Tm');
        return $this;
    }

    public function setRotation($x)
    {
        $cos = round(cos($x)*100)/100;
        $sin = round(sin($x)*100)/100;

        $this->stream->push($cos . ' ' . $sin . ' ' . -$sin . ' ' . $cos . ' 0 0 Tm');
        return $this;
    }
}
