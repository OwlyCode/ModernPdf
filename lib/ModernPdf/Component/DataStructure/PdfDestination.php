<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DataStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DataStructure;

use \ModernPdf\Component\ObjectType;

class PdfDestination extends ObjectType\PdfArray
{
    /**
     * Display the page at a scale which just fits the whole page in the window
     * both horizontally and vertically.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     */
    public function setFit(ObjectType\PdfIndirectReference $page)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('Fit')
        );
    }

    /**
     * Display the page with the vertical coordinate top at the top edge of the
     * window, and the magnification set to fit the document horizontally.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public function setFitH(ObjectType\PdfIndirectReference $page, $top)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitH'),
            $top
        );
    }

    /**
     * Display the page with the horizontal coordinate left at the left edge of
     * the window, and the magnification set to fit the document vertically.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public function setFitV(ObjectType\PdfIndirectReference $page, $left)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitV'),
            $left
        );
    }

    /**
     * Display the page zoomed to show the rectangle specified by left, bottom,
     * right, and top.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $left   The left coordinate.
     * @param integer              $bottom The bottom coordinate.
     * @param integer              $right  The right coordinate.
     * @param integer              $top    The top coordinate.
     */
    public function setFitR(ObjectType\PdfIndirectReference $page, $left, $bottom, $right, $top)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitR'),
            $left,
            $bottom,
            $right,
            $top
        );
    }

    /**
     * Display the page like /Fit, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     */
    public function setFitB(ObjectType\PdfIndirectReference $page)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitB')
        );
    }

    /**
     * Display the page like /FitH, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public function setFitBH(ObjectType\PdfIndirectReference $page, $top)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitBH'),
            $top
        );
    }

    /**
     * Display the page like /FitV, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public function setFitBV(ObjectType\PdfIndirectReference $page, $left)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('FitBV'),
            $left
        );
    }

    /**
     * Display the page with (left, top) at the upper-left corner of the window
     * and the page magnified by factor zoom. A null value for any parameter
     * indicates no change.
     *
     * @param ObjectType\PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     * @param integer              $top  The top coordinate.
     * @param integer              $zoom The zoom.
     */
    public function setXyz(ObjectType\PdfIndirectReference $page, $left, $top, $zoom)
    {
        $this->values = array(
            $page,
            new ObjectType\PdfName('XYZ'),
            $left,
            $top,
            $zoom
        );
    }
}
