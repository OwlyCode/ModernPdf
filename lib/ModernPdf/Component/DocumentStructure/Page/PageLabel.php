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

class PageLabel extends ObjectType\PdfConstrainedDictionary
{
    const DECIMAL          = 'D';
    const UPPERCASE_ROMAN  = 'R';
    const LOWERCASE_ROMAN  = 'r';
    const UPPERCASE_LETTER = 'A';
    const LOWERCASE_LETTER = 'a';

    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Type'] = new ObjectType\PdfName('PageLabel');
    }

    protected function getMapping()
    {
        return [
            'NumberingStyle' => [
                'field'       => 'S',
                'description' => 'The numbering style to be used for the numeric portion of each page label.',
                'type'        => 'Name',
            ],
            'Prefix' => [
                'field'       => 'P',
                'description' => 'The label prefix for page labels in this range.',
                'type'        => 'String',
            ],
            'Start' => [
                'field'       => 'St',
                'description' => 'The value of the numeric portion for the first page label in the range.',
                'type'        => 'Numeric',
            ],
        ];
    }
}
