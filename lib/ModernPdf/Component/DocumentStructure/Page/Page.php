<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Page
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Page;

use ModernPdf\Component\FileStructure\Object;
use ModernPdf\Component\ObjectType\PdfIndirectReference;
use \ModernPdf\Component\ObjectType;

/**
 * Represents a single Page.
 */
class Page extends ObjectType\PdfConstrainedDictionary
{
    const SIZE_A3 = [0, 0, 842, 1190];
    const SIZE_A4 = [0, 0, 595, 842];
    const SIZE_A5 = [0, 0, 420, 595];

    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Contents'] = new ObjectType\PdfArray();
        $this['Annots'] = new ObjectType\PdfArray();
        $this['MediaBox'] = new ObjectType\PdfArray(self::SIZE_A4);
        $this['Type'] = new ObjectType\PdfName('Page');
    }

    protected function getMapping()
    {
        return [
            'Parent' => [
                'description' => 'The parent indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Resource' => [
                'field'       => 'Resources',
                'description' => 'The resource indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Rotate' => [
                'description' => 'Applies a rotation to the page. Must be a multiple of 90.',
                'type'        => 'Numeric',
            ],
            'MediaBox' => [
                'description' => 'The mediabox of the page.',
                'type'        => 'Array',
            ],
            'Contents' => [
                'description' => 'the array containing the indirect references of the contents of the page.',
                'type'        => 'Array',
            ],
            'Annots' => [
                'description' => 'the array containing the indirect references of annotations.',
                'type'        => 'IndirectReference',
            ],
        ];
    }

    /**
     * Applies a rotation to the page.
     *
     * @param integer $rotate The rotation to apply, in degrees. Must be a multiple of 90.
     *
     * @throws InvalidArgumentException If $rotate isn't a multiple of 90.
     */
    public function setRotate($rotate)
    {
        if ($rotate % 90 !== 0) {
            throw new \InvalidArgumentException('Page rotate must be a multiple of 90.');
        }
        return $this['Rotate'] = $rotate;
    }

    /**
     * Adds a content stream to the page via its indirect reference.
     *
     * @param PdfIndirectReference|Object $stream The stream indirect reference.
     */
    public function addContent($stream)
    {
        $this['Contents'][] = $stream instanceof PdfIndirectReference ? $stream : new PdfIndirectReference ($stream);
    }

    /**
     * Adds an annotation to the page via its indirect reference.
     *
     * @param PdfIndirectReference|Object $stream The annotation indirect reference.
     */
    public function addAnnot($annot)
    {
        $this['Annots'][] = $annot instanceof PdfIndirectReference ? $annot : new PdfIndirectReference ($annot);
    }
}
