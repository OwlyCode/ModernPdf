<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Page
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Page;

use \ModernPdf\Component\ObjectType;
use \ModernPdf\Component\FileStructure;

/**
 * Represents a PageTree which can hold pages.
 */
class PageTree extends ObjectType\PdfConstrainedDictionary
{
    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Kids'] = new ObjectType\PdfArray();
        $this['Type'] = new ObjectType\PdfName('Pages');
    }

    protected function getMapping()
    {
        return [
            'Kids' => [
                'description' => 'The array containing the indirect references to this PageTree kid pages.',
                'type'        => 'Array',
            ],
            'Parent' => [
                'description' => 'The parent indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Count' => [
                'description' => 'The kid count.',
                'type'        => 'Numeric',
            ],
        ];
    }

    /**
     * Adds a page indirect reference to the pagetree.
     *
     * @param ObjectType\PdfIndirectReference|FileStructure\Object $kid The page indirect reference.
     */
    public function addKid($kid)
    {
        $kid = $kid instanceof ObjectType\PdfIndirectReference ? $kid : new ObjectType\PdfIndirectReference($kid);

        $this['Kids'][] = $kid;
        $this['Count']  = count($this->getKids());
    }
}
