<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ObjectType
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ObjectType;

use ModernPdf\Component\FileStructure\Object;
use ModernPdf\Component\ObjectType\PdfIndirectReference;
use \ModernPdf\Component\ObjectType;

class PdfDestination extends ObjectType\PdfArray
{
    /**
     * Display the page at a scale which just fits the whole page in the window
     * both horizontally and vertically.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     */
    public static function fromFit($page)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('Fit')
        ]);
    }

    /**
     * Display the page with the vertical coordinate top at the top edge of the
     * window, and the magnification set to fit the document horizontally.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public static function fromFitH($page, $top)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitH'),
            $top
        ]);
    }

    /**
     * Display the page with the horizontal coordinate left at the left edge of
     * the window, and the magnification set to fit the document vertically.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public static function fromFitV($page, $left)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitV'),
            $left
        ]);
    }

    /**
     * Display the page zoomed to show the rectangle specified by left, bottom,
     * right, and top.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $left   The left coordinate.
     * @param integer              $bottom The bottom coordinate.
     * @param integer              $right  The right coordinate.
     * @param integer              $top    The top coordinate.
     */
    public static function fromFitR($page, $left, $bottom, $right, $top)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitR'),
            $left,
            $bottom,
            $right,
            $top
        ]);
    }

    /**
     * Display the page like /Fit, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     */
    public static function fromFitB($page)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitB')
        ]);
    }

    /**
     * Display the page like /FitH, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public static function fromFitBH($page, $top)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitBH'),
            $top
        ]);
    }

    /**
     * Display the page like /FitV, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public static function fromFitBV($page, $left)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('FitBV'),
            $left
        ]);
    }

    /**
     * Display the page with (left, top) at the upper-left corner of the window
     * and the page magnified by factor zoom. A null value for any parameter
     * indicates no change.
     *
     * @param PdfIndirectReference|Object $page The page indirect reference.
     * @param integer              $left The left coordinate.
     * @param integer              $top  The top coordinate.
     * @param integer              $zoom The zoom.
     */
    public static function fromXyz($page, $left, $top, $zoom)
    {
        return new PdfDestination([
            $page instanceof ObjectType\PdfIndirectReference ? $page : new ObjectType\PdfIndirectReference($page),
            new ObjectType\PdfName('XYZ'),
            $left,
            $top,
            $zoom
        ]);
    }
}
