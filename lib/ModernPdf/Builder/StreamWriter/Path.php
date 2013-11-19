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

use ModernPdf\Component\ObjectType;

class Path
{
    protected $stream;
    protected $builder;

    public function __construct(&$stream)
    {
        $this->stream = $stream;
    }

    /**
     * Moves the path.
     *
     * @param integer $x The x coordinate.
     * @param integer $y The y coordinate.
     */
    public function move($x, $y)
    {
        $this->stream->push($x.' '.$y.' m');
        return $this;
    }

    /**
     * Add a line to the path.
     *
     * @param integer $x The x coordinate.
     * @param integer $y The y coordinate.
     */
    public function line($x, $y)
    {
        $this->stream->push($x.' '.$y.' l');
        return $this;
    }

    /**
     * Add a bézier curve to the path.
     *
     * @param integer $cx  The x coordinate of the first control point.
     * @param integer $cy  The y coordinate of the first control point.
     * @param integer $cx2 The x coordinate of the second control point.
     * @param integer $cy2 The y coordinate of the second control point.
     * @param integer $x   The x coordinate of the end point.
     * @param integer $y   The y coordinate of the end point.
     */
    public function bezier($cx, $cy, $cx2, $cy2, $x, $y)
    {
        $this->stream->push($cx.' '.$cy.' '.$cx2.' '.$cy2.' '.$x.' '.$y.' c');
        return $this;
    }

    public function image(ObjectType\PdfName $image)
    {
        $this->stream->push($image . ' Do');
    }

    /**
     * Paint a line along the current path using the current stroke color.
     */
    public function strokePath()
    {
        $this->stream->push('S');
        return $this;
    }

    /**
     * Close the current subpath joining the start to the end.
     */
    public function closePath()
    {
        $this->stream->push('h');
        return $this;
    }

    /**
     * Fill the current path using the current fill color.
     * This fill method uses the nonzero winding number rule.
     * There are other PDF operators to allow the use of the even-odd rule but
     * these are not generally useful.
     */
    public function fillPath()
    {
        $this->stream->push('f');
        return $this;
    }

    /**
     * Intersect the path with the current clipping path to establish a new
     * clipping path.
     * This actually comprises two operators rather than one but they are almost
     * invariably used in this combination.
     */
    public function clipPath()
    {
        $this->stream->push('W n');
        return $this;
    }
}
