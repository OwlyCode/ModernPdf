<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure;

use \ModernPdf\Component\ObjectType;

class OutputIntent extends ObjectType\PdfConstrainedDictionary
{
    /**
     * @param array $values
     */
    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Type'] = new ObjectType\PdfName('OutputIntent');
    }

    protected function getMapping()
    {
        return [
            'SubType' => [
                'field'       => 'S',
                'description' => 'Sets the subtype of the output intent. Shall be either one of GTS_PDFX, GTS_PDFA1, ISO_PDFE1 or a key defined by an ISO 32000 extension.',
                'type'        => 'Name',
            ],
            'OutputCondition' => [
                'description' => 'A text string concisely identifying the intended output device or production condition in human-readable form.',
                'type'        => 'String',
            ],
            'OutputConditionIdentifier' => [
                'description' => 'A text string identifying the intended output device or production condition in human- or machinereadable form. If human-readable, this string may be used in lieu of an OutputCondition string for presentation to the user.',
                'type'        => 'String',
            ],
            'RegistryName' => [
                'description' => 'An text string (conventionally a uniform resource identifier, or URI) identifying the registry in which the condition designated by OutputConditionIdentifier is defined.',
                'type'        => 'String',
            ],
            'Info' => [
                'description' => '(Required if OutputConditionIdentifier does not specify a standard production condition; optional otherwise) A human-readable text string containing additional information or comments about the intended target device or production condition.',
                'type'        => 'String',
            ],
            'DestOutputProfile' => [
                'description' => 'An ICC profile stream indirect reference defining the transformation from the PDF document’s source colours to output device colorants.',
                'type'        => 'IndirectReference',
            ],
        ];
    }
}
