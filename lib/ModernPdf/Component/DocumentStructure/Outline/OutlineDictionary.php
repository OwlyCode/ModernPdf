<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Outline
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Outline;

use \ModernPdf\Component\ObjectType;

/**
 * Represents an Outline Dictionary.
 */
class OutlineDictionary extends ObjectType\PdfConstrainedDictionary
{
    protected function getMapping()
    {
        return [
            'Title' => [
                'description' => 'The title to display.',
                'type'        => 'String',
            ],
            'Parent' => [
                'description' => 'The parent outlines indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Prev' => [
                'description' => 'The prev outlines indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Next' => [
                'description' => 'The next outlines indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'First' => [
                'description' => 'The first outline dictionary.',
                'type'        => 'IndirectReference',
            ],
            'Last' => [
                'description' => 'The last outline indirect reference.',
                'type'        => 'IndirectReference',
            ],
            'Count' => [
                'description' => 'the total count of outlines',
                'type'        => 'Numeric',
            ],
            'Dest' => [
                'description' => 'The destination. Arrays are destinations, names are references to entries in the /Dests entry in the document catalog, strings are references to entries in the /Dests entry in the document’s name dictionary.',
                'type'        => 'Destination',
            ],
        ];
    }
}
