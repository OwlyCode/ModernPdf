<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Metadata
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Metadata;

use ModernPdf\Component\ObjectType;

/**
 * Represents the document informations dictionary.
 */
class DocumentInformation extends ObjectType\PdfConstrainedDictionary
{
    public function __construct($values = array())
    {
        parent::__construct($values);
    }

    protected function getMapping()
    {
        return [
            'Title' => [
                'description' => 'The document’s title. Note that this is nothing to do with any title displayed on the first page.',
                'type'        => 'String',
            ],
            'Subject' => [
                'description' => 'The subject of the document. Again, this is just metadata with no particular rules about content.',
                'type'        => 'String',
            ],
            'Keywords' => [
                'description' => 'Keywords associated with this document. No advice is given as to how to structure these.',
                'type'        => 'String',
            ],
            'Author' => [
                'description' => 'The author of the pdf.',
                'type'        => 'String',
            ],
            'Creator' => [
                'description' => 'The name of the program which originally created this document, if it started as another format (for example, “Microsoft Word”).',
                'type'        => 'String',
            ],
            'Producer' => [
                'description' => 'The name of the program which converted this file to PDF, if it started as another format (for example, the format of a word processor).',
                'type'        => 'String',
            ],
            'CreationDate' => [
                'description' => 'The creation date of the pdf.',
                'type'        => 'Date',
            ],
            'ModificationDate' => [
                'field'       => 'ModDate',
                'description' => 'The modification date of the pdf.',
                'type'        => 'Date',
            ],
        ];
    }
}
