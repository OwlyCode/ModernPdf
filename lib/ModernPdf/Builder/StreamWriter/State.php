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

class State
{
    protected $stream;

    public function __construct(&$stream)
    {
        $this->stream = $stream;
    }

    /**
     * Saves the current graphic state.
     */
    public function saveGraphicState()
    {
        $this->stream->push('q');
        return $this;
    }

    /**
     * Restores the last saved grapĥic state.
     */
    public function restoreGraphicState()
    {
        $this->stream->push('Q');
        return $this;
    }

    /**
     * Sets the line width.
     *
     * @param integer $points The line width in points.
     */
    public function setLineWidth($points)
    {
        $this->stream->push($points.' w');
        return $this;
    }

    /**
     * Sets the gray color used for stroke.
     *
     * @param integer $scolor The gray color between 0. and 1.
     */
    public function setGrayStrokeColor($color)
    {
        $this->stream->push($color . ' g');
        return $this;
    }

    /**
     * Sets the gray color used for fill.
     *
     * @param integer $scolor The gray color between 0. and 1.
     */
    public function setGrayFillColor($color)
    {
        $this->stream->push($color . ' G');
        return $this;
    }

    /**
     * Sets the RGB color used for stroke.
     *
     * @param integer $r The red color between 0. and 1.
     * @param integer $g The green color between 0. and 1.
     * @param integer $b The blue color between 0. and 1.
     */
    public function setRgbStrokeColor($r, $g, $b)
    {
        $this->stream->push($r . ' ' . $g . ' ' . $b . ' rg');
        return $this;
    }

    /**
     * Sets the RGB color used for fill.
     *
     * @param integer $r The red color between 0. and 1.
     * @param integer $g The green color between 0. and 1.
     * @param integer $b The blue color between 0. and 1.
     */
    public function setRgbFillColor($r, $g, $b)
    {
        $this->stream->push($r . ' ' . $g . ' ' . $b . ' RG');
        return $this;
    }

    /**
     * Concatenate a translation matrix to the current translation matrix.
     *
     * @param integer $x The x axis translation.
     * @param integer $y The y axis translation.
     */
    public function addTranslation($x, $y)
    {
        $this->stream->push('1 0 0 1 ' . $x . ' ' . $y . ' cm');
        return $this;
    }

    /**
     * Concatenate a scaling matrix to the current transformation matrix.
     *
     * @param integer $sx The x axis scaling.
     * @param integer $sy The y axis scaling.
     */
    public function addScaling($sx, $sy)
    {
        $this->stream->push($sx . ' 0 0 ' . $sy . ' 0 0 cm');
        return $this;
    }

    /**
     * Concatenate a rotation matrix to the current transformation matrix.
     *
     * @param integer $x The rotation in counterclockwise radians.
     */
    public function addRotation($x)
    {
        $cos = round(cos($x)*100)/100;
        $sin = round(sin($x)*100)/100;

        $this->stream->push($cos . ' ' . $sin . ' ' . -$sin . ' ' . $cos . ' 0 0 cm');
        return $this;
    }

    /**
    * The line cap for the ends of any lines to be stroked. Possible values are:
    *
    * 0 : Butt. The stroke is square at the end of the path and does not project
    * beyond the end of the path.
    *
    * 1 : Round. A semicircle is added at the end of the path projecting beyond
    * the endpoints.
    *
    * 2 : Projecting Square. The stroke is square but projects a distance of
    * half the line width beyond the ends of the path.
    */
    public function setLineCap($cap)
    {
        $this->stream->push($cap.' J');
        return $this;
    }

    /**
     * The line join for the shape of joints between connected segments of a path.
     * Possible values are:
     *
     * 0 : Miter. The outer edges for the two segments are extended until they meet.
     * This is the same way that wooden segments are joined to make a picture
     * frame. If the segments meet at an overly steep angle a bevel join is used
     * instead. The precise cut-off point is called the Miter Limit (see below).
     *
     * 1 : Round. A pie slice is added to the junction of the two segments to
     * produce a rounded corner.
     *
     * 2 : Bevel. The two segments are finished with butt caps and any notch between
     * the two is filled in.
     */
    public function setLineJoin($join)
    {
        $this->stream->push($join.' j');
        return $this;
    }

    /**
     * The maximum length of mitered line joins for paths.
     *
     * The miter limit is expressed in terms of the ratio of the thickness of
     * the line to the thickness of the join.
     *
     * For example a value of 1.5 will allow the width of the line at the join
     * to be up to one and a half times the thickness of the width of an
     * individual line segment.
     *
     * @param integer $limit The miter limit.
     */
    public function setMiterLimit($limit)
    {
        $this->stream->push($limit.' M');
        return $this;
    }

    /**
     * Sets the dashing pattern for the line.
     *
     * [] 0 is a continuous line.
     * [10 10] 0 is a 10 points line then 10 points space dashing pattern.
     *
     * @param Model\Type\PdfArray $pattern The dashing pattern.
     * @param integer             $offset  The initial offset in the pattern.
     */
    public function setLineDash(Model\Type\PdfArray $pattern, $offset)
    {
        $this->stream->push($pattern . ' ' . $offset . ' d');
        return $this;
    }
}
