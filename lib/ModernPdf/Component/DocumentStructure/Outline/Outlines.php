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
 * Represents a Outlines.
 */
class Outlines extends ObjectType\PdfConstrainedDictionary
{
    protected function getMapping()
    {
        return [
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
        ];
    }

    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Type'] = new ObjectType\PdfName('Outlines');
    }
}
