<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure;

use ModernPdf\Component\ObjectType\PdfIndirectReference;
use \ModernPdf\Component\ObjectType;

/**
 * Represents the document catalog dictionary.
 */
class DocumentCatalog extends ObjectType\PdfConstrainedDictionary
{
    /**
     * @see Object::getType()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Type'] = new ObjectType\PdfName('Catalog');
    }

    protected function getMapping()
    {
        return [
            'PageTree' => [
                'field'       => 'Pages',
                'description' => 'The indirect reference to the page tree.',
                'type'        => 'IndirectReference',
                'version'     => '1.0',
            ],
            'Metadata' => [
                'description' => 'The indirect reference to the metadata.',
                'type'        => 'IndirectReference',
                'version'     => '1.4',
            ],
            'MarkInfo' => [
                'type'        => 'Dictionary',
            ],
            'OutputIntents' => [
                'type'        => 'Array',
                'description' => ' An array of output intent dictionaries describing the color characteristics of output devices on which the document might be rendered',
                'version'     => '1.4',
            ],
            'Outlines' => [
                'description' => 'The outlines indirect reference.',
                'type'        => 'IndirectReference',
                'version'     => '1.0',
            ],
            'Version' => [
                'description' => 'The version of the pdf.',
                'type'        => 'Name',
                'version'     => '1.4',
            ],
        ];
    }

    /**
     * @param bool $mark
     */
    public function mark($mark)
    {
        $this['MarkInfo'] = new ObjectType\PdfDictionary(array(
            'Marked' => $mark ? "true" : "false"
        ));
    }

    /**
     * Adds an output intent indirect reference to the catalog.
     *
     * @param PdfIndirectReference $intent The OutputIntent indirect reference.
     */
    public function addOutputIntent($intent)
    {
        if (!isset($this['OutputIntents'])) {
            $this['OutputIntents'] = new ObjectType\PdfArray();
        }

        $this['OutputIntents'][] = $intent instanceof PdfIndirectReference ? $intent : new ObjectType\PdfIndirectReference($intent);
    }
}
