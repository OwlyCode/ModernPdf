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
use \ModernPdf\Component\DocumentStructure\Font;
use \ModernPdf\Component\FileStructure;
use \ModernPdf\Component\ContentStream;
use \ModernPdf\Component\ObjectType;

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

    public function buildFontDescriptor(FileStructure\Object $font)
    {
        $descriptor = new Font\FontDescriptor();
        $descriptor->setFontName(new ObjectType\PdfName($this->config['name']));
        $descriptor->setFlags($this->config['flags']);
        $descriptor->setFontBBox(new ObjectType\PdfArray($this->config['font_bbox']));
        $descriptor->setItalicAngle($this->config['italic_angle']);
        $descriptor->setAscent($this->config['ascent']);
        $descriptor->setDescent($this->config['descent']);
        $descriptor->setLeading($this->config['leading']);
        $descriptor->setCapHeight($this->config['cap_height']);
        $descriptor->setStemV($this->config['stem_v']);
        //$descriptor->setAvgWidth();
        //$descriptor->setMaxWidth();
        $descriptor->setMissingWidth($this->config['missing_width']);
        $descriptor->setFontFile2(new ObjectType\PdfIndirectReference($font));

        return $descriptor;
    }

    public function buildFontStream()
    {
        $stream = new ContentStream\FontStream();
        $stream->setLength1(strlen($this->data));
        $stream->push($this->data);

        return $stream;
    }

    public function buildEncoding()
    {
        $encoding = new Font\Encoding();
        $encoding->setBaseEncoding(new ObjectType\PdfName($this->config['base_encoding']));
        $encoding->setDifferences(new ObjectType\PdfArray($this->config['differences']));

        return $encoding;
    }

    public function buildWidths()
    {
        $widths = new ObjectType\PdfArray($this->config['widths']);
        return $widths;
    }

    public function buildFont(FileStructure\Object $fontDescriptor, FileStructure\Object $encoding, FileStructure\Object $widths)
    {
        $font = new Font\TrueType($this->config['name']);

        $font->setFirstChar($this->config['first_char']);
        $font->setLastChar($this->config['last_char']);
        $font->setWidths(new ObjectType\PdfIndirectReference($widths));
        $font->setFontDescriptor(new ObjectType\PdfIndirectReference($fontDescriptor));
        $font->setEncoding(new ObjectType\PdfIndirectReference($encoding));

        return $font;
    }
}
