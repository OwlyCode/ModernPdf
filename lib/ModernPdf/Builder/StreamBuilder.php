<?php
/**
 * Resources used :
 * http://www.websupergoo.com/helppdfnet/source/4-examples/17-advancedgraphics.htm
 * http://www.verypdf.com/document/pdf-format-reference/pg_0402.htm
 *
 * @category Builder
 * @package  ModernPdf\Builder
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Builder;

/**
 * This class must be binded to a Stream and writes graphics instructions in it.
 */
class StreamBuilder
{
    protected $stream;
    protected $path;
    protected $state;
    protected $text;

    const RENDERING_MODE_FILL = 0;
    const RENDERING_MODE_STROKE = 1;
    const RENDERING_MODE_FILL_AND_STROKE = 2;
    const RENDERING_MODE_INVISIBLE = 3;
    const RENDERING_MODE_FILL_AND_CLIP = 4;
    const RENDERING_MODE_STROKE_AND_CLIP = 5;
    const RENDERING_MODE_FILL_AND_STROKE_AND_CLIP = 6;
    const RENDERING_MODE_CLIP = 7;

    const LINE_CAP_BUTT = 0; // Butt caps. Squared off at the end of the line.
    const LINE_CAP_ROUND = 1; // Round caps. Semicircles attached at the end of each line.
    const LINE_CAP_PROJECTED = 2; // Projecting square caps. Projects at end of line for half the width of the line, and is then squared off.

    const LINE_JOIN_MITER = 0; // The outer edges for the two segments are extended until they meet.
    const LINE_JOIN_ROUND = 1; // A pie slice is added to the junction of the two segments to produce a rounded corner.
    const LINE_JOIN_BEVEL = 2; // The two segments are finished with butt caps and any notch between the two is filled in.

    /**
     * Binds a new StreamBuilder to a Stream.
     *
     * @param \ModernPdf\Model\Object\Stream $stream The stream to bind to.
     */
    public function __construct(\ModernPdf\Model\Object\Stream &$stream)
    {
        $this->stream = $stream;
        $this->path = new StreamWriter\Path($stream);
        $this->state = new StreamWriter\State($stream);
        $this->text = new StreamWriter\Text($stream);
    }

    /**
     * Gets the PathWriter, which holds all the methods to work with pathes.
     *
     * @return StreamWriter\Path The path writer.
     */
    public function getPathWriter()
    {
        return $this->path;
    }

    /**
     * Gets the TextWriter, which holds all the methods to work with text.
     *
     * @return StreamWriter\Text The path writer.
     */
    public function getTextWriter()
    {
        return $this->text;
    }

    /**
     * Gets the StateWriter, which holds all the methods to work with states.
     *
     * @return StreamWriter\State The path writer.
     */
    public function getStateWriter()
    {
        return $this->state;
    }
}
