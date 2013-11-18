<?php
/**
 * @category Builder
 * @package  ModernPdf\Builder
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Builder;

use Symfony\Component\Yaml\Yaml;
use \ModernPdf\Model\Resource\Font;
use \ModernPdf\Model\Object;
use \ModernPdf\Model\Type;

class TrueTypeBuilder
{
    protected $data;
    protected $config;

    public function load($name)
    {
        $ttfPath = __DIR__ . "/../Resource/fonts/" . $name . ".ttf";
        $ymlPath = __DIR__ . "/../Resource/fonts/" . $name . ".yml";

        $fd = fopen($ttfPath, 'rb');
        $size = filesize($ttfPath);
        $this->data = fread($fd, $size);
        fclose($fd);

        $this->config = Yaml::parse($ymlPath);
    }

    public function buildFontDescriptor(Object\FontStream $font, $objectNumber, $generationNumber = 0)
    {
        $descriptor = new Object\FontDescriptor($objectNumber, $generationNumber);
        $descriptor->setFontName(new Type\PdfName($this->config['name']));
        $descriptor->setFlags($this->config['flags']);
        $descriptor->setFontBBox(new Type\PdfArray($this->config['font_bbox']));
        $descriptor->setItalicAngle($this->config['italic_angle']);
        $descriptor->setAscent($this->config['ascent']);
        $descriptor->setDescent($this->config['descent']);
        $descriptor->setLeading($this->config['leading']);
        $descriptor->setCapHeight($this->config['cap_height']);
        $descriptor->setStemV($this->config['stem_v']);
        //$descriptor->setAvgWidth();
        //$descriptor->setMaxWidth();
        $descriptor->setMissingWidth($this->config['missing_width']);
        $descriptor->setFontFile2(new Type\PdfIndirectReference($font));

        return $descriptor;
    }

    public function buildFontStream($objectNumber, $generationNumber = 0)
    {
        $stream = new Object\FontStream($objectNumber, $generationNumber);
        $stream->setLength1(strlen($this->data));
        $stream->push($this->data);

        return $stream;
    }

    public function buildEncoding($objectNumber, $generationNumber = 0)
    {
        $encoding = new Object\Encoding($objectNumber, $generationNumber);
        $encoding->setBaseEncoding(new Type\PdfName($this->config['base_encoding']));
        $encoding->setDifferences(new Type\PdfArray($this->config['differences']));

        return $encoding;
    }

    public function buildWidths($objectNumber, $generationNumber = 0)
    {
        $widths = new Object\Widths($objectNumber, $generationNumber);
        $widths->set($this->config['widths']);

        return $widths;
    }

    public function buildFont(Object\FontDescriptor $fontDescriptor, Object\Encoding $encoding, Object\Widths $widths, $objectNumber, $generationNumber = 0)
    {
        $font = new Font\TrueType($this->config['name'], $objectNumber, $generationNumber);

        $font->setFirstChar($this->config['first_char']);
        $font->setLastChar($this->config['last_char']);
        $font->setWidths(new Type\PdfIndirectReference($widths));
        $font->setFontDescriptor(new Type\PdfIndirectReference($fontDescriptor));
        $font->setEncoding(new Type\PdfIndirectReference($encoding));

        return $font;
    }
}
