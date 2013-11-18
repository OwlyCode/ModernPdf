<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Type
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Type;

class PdfDestination extends PdfArray
{
    /**
     * Display the page at a scale which just fits the whole page in the window
     * both horizontally and vertically.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     */
    public function setFit(PdfIndirectReference $page)
    {
        $this->values = array(
            $page,
            new PdfName('Fit')
        );
    }

    /**
     * Display the page with the vertical coordinate top at the top edge of the
     * window, and the magnification set to fit the document horizontally.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public function setFitH(PdfIndirectReference $page, $top)
    {
        $this->values = array(
            $page,
            new PdfName('FitH'),
            $top
        );
    }

    /**
     * Display the page with the horizontal coordinate left at the left edge of
     * the window, and the magnification set to fit the document vertically.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public function setFitV(PdfIndirectReference $page, $left)
    {
        $this->values = array(
            $page,
            new PdfName('FitV'),
            $left
        );
    }

    /**
     * Display the page zoomed to show the rectangle specified by left, bottom,
     * right, and top.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $left   The left coordinate.
     * @param integer              $bottom The bottom coordinate.
     * @param integer              $right  The right coordinate.
     * @param integer              $top    The top coordinate.
     */
    public function setFitR(PdfIndirectReference $page, $left, $bottom, $right, $top)
    {
        $this->values = array(
            $page,
            new PdfName('FitR'),
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
     * @param PdfIndirectReference $page The page indirect reference.
     */
    public function setFitB(PdfIndirectReference $page)
    {
        $this->values = array(
            $page,
            new PdfName('FitB')
        );
    }

    /**
     * Display the page like /FitH, but use the bounding box of the page’s
     * contents, rather than the crop box.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $top  The top coordinate.
     */
    public function setFitBH(PdfIndirectReference $page, $top)
    {
        $this->values = array(
            $page,
            new PdfName('FitBH'),
            $top
        );
    }

    /**
     * Display the page like /FitV, but use the bounding box of the page’s 
     * contents, rather than the crop box.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     */
    public function setFitBV(PdfIndirectReference $page, $left)
    {
        $this->values = array(
            $page,
            new PdfName('FitBV'),
            $left
        );
    }

    /**
     * Display the page with (left, top) at the upper-left corner of the window
     * and the page magnified by factor zoom. A null value for any parameter
     * indicates no change.
     *
     * @param PdfIndirectReference $page The page indirect reference.
     * @param integer              $left The left coordinate.
     * @param integer              $top  The top coordinate.
     * @param integer              $zoom The zoom.
     */
    public function setXyz(PdfIndirectReference $page, $left, $top, $zoom)
    {
        $this->values = array(
            $page,
            new PdfName('XYZ'),
            $left,
            $top,
            $zoom
        );
    }
}
