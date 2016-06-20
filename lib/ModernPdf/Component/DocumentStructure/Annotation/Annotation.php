<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Annotation
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Annotation;

use \ModernPdf\Component\ObjectType;

/**
 * Represents an Annotation.
 */
class Annotation extends ObjectType\PdfConstrainedDictionary
{
    const TYPE_TEXT = 'Text';

    const TYPE_LINK = 'Link';

    /**
     * @pdfApi 1.3
     */
    const TYPE_FREETEXT = 'FreeText';

    /**
     * @pdfApi 1.3
     */
    const TYPE_LINE = 'Line';

    /**
     * @pdfApi 1.3
     */
    const TYPE_SQUARE = 'Square';

    /**
     * @pdfApi 1.3
     */
    const TYPE_CIRCLE = 'Circle';

    /**
     * @pdfApi 1.5
     */
    const TYPE_POLYGON = 'Polygon';

    /**
     * @pdfApi 1.5
     */
    const TYPE_POLYLINE = 'PolyLine';

    /**
     * @pdfApi 1.3
     */
    const TYPE_HIGHLIGHT = 'Highlight';

    /**
     * @pdfApi 1.3
     */
    const TYPE_UNDERLINE = 'Underline';

    /**
     * @pdfApi 1.4
     */
    const TYPE_SQUIGGLY = 'Squiggly';

    /**
     * @pdfApi 1.3
     */
    const TYPE_STRIKEOUT = 'StrikeOut';

    /**
     * @pdfApi 1.3
     */
    const TYPE_STAMP = 'Stamp';

    /**
     * @pdfApi 1.5
     */
    const TYPE_CARET = 'Caret';

    /**
     * @pdfApi 1.3
     */
    const TYPE_INK = 'Ink';

    /**
     * @pdfApi 1.3
     */
    const TYPE_POPUP = 'Popup';

    /**
     * @pdfApi 1.3
     */
    const TYPE_FILEATTACHEMENT = 'FileAttachement';

    /**
     * @pdfApi 1.2
     */
    const TYPE_SOUND = 'Sound';

    /**
     * @pdfApi 1.2
     */
    const TYPE_MOVIE = 'Movie';

    /**
     * @pdfApi 1.2
     */
    const TYPE_WIDGET = 'Widget';

    /**
     * @pdfApi 1.5
     */
    const TYPE_SCREEN = 'Screen';

    /**
     * @pdfApi 1.4
     */
    const TYPE_PRINTERMARK = 'PrinterMark';

    /**
     * @pdfApi 1.3
     */
    const TYPE_TRAPNET = 'TrapNet';

    /**
     * @pdfApi 1.6
     */
    const TYPE_WATERMARK = 'Watermark';

    /**
     * @pdfApi 1.6
     */
    const TYPE_3D = '3D';

    protected function getMapping()
    {
        return [
            'Content' => [
                'field'       => 'Contents',
                'description' => 'Specifies the displayed text.',
                'version'     => '1.0',
                'type'        => 'String'
            ],
            'Rect' => [
                'required'    => true,
                'description' => 'The location and size of the annotation in default user space units.',
                'type'        => 'Array' // @todo Rectangle Type
            ],
            'Page' => [
                'field'       => 'P',
                'description' => 'An indirect reference to the page object with which this annotation is associated.',
                'version'     => '1.3',
                'type'        => 'IndirectReference'
            ],
            'UniqueName' => [
                'field'       => 'NM',
                'description' => 'The annotation name, a text string uniquely identifying it among all the annotations on its page.',
                'version'     => '1.4',
                'type'        => 'String'
            ],
            'ModificationDate' => [
                'field'       => 'M',
                'description' => 'The date and time when the annotation was most recently modified.',
                'version'     => '1.1',
                'type'        => 'Date'
            ],
            'Flags' => [
                'field'       => 'F',
                'description' => 'A set of flags specifying various characteristics of the annotation.',
                'version'     => '1.1',
                'type'        => 'Numeric' // @todo helper for http://www.verypdf.com/document/pdf-format-reference/pg_0608.htm
            ],
            'Appearance' => [
                'field'       => 'AP',
                'description' => 'An appearance dictionary specifying how the annotation is presented visually on the page',
                'version'     => '1.2',
                'type'        => 'Dictionary' // @todo helper for http://www.verypdf.com/document/pdf-format-reference/pg_0612.htm
            ],
            'AppearanceState' => [
                'field'       => 'AS',
                'description' => 'The annotation’s appearance state, which selects the applicable appearance stream from an appearance subdictionary',
                'version'     => '1.2',
                'type'        => 'Name'
            ],
            'Border' => [
                'description' => 'An array specifying the characteristics of the annotation’s border. The border is specified as a rounded rectangle',
                'type'        => 'Array'
            ],
            'Color' => [
                'field'       => 'C',
                'description' => 'An array of numbers in the range 0.0 to 1.0, representing a color used for background, title bar and border of a link.',
                'version'     => '1.1',
                'type'        => 'Array'
            ],
            'StructuralParent' => [
                'field'       => 'StructParent',
                'description' => 'The integer key of the annotation’s entry in the structural parent tree',
                'version'     => '1.3',
                'type'        => 'Numeric'
            ],
            'OptionalContent' => [
                'field'       => 'OC',
                'description' => 'An optional content group or optional content membership dictionary',
                'version'     => '1.5',
                'type'        => 'Dictionary'
            ],
            'TextLabel' => [
                'field'       => 'T',
                'description' => 'The text label to be displayed in the title bar of the annotation’s pop-up window when open and active. By convention, this entry identifies the user who added the annotation.',
                'version'     => '1.1',
                'type'        => 'String'
            ],
            'Popup' => [
                'description' => 'An indirect reference to a pop-up annotation for entering or editing the text associated with this annotation',
                'version'     => '1.3',
                'type'        => 'IndirectReference'
            ],
            'ConstantOpacity' => [
                'field'       => 'CA',
                'description' => 'The constant opacity value to be used in painting the annotation.',
                'version'     => '1.4',
                'type'        => 'Numeric'
            ],
            'RichText' => [
                'field'       => 'RC',
                'description' => 'A rich text string to be displayed in the pop-up window when the annotation is opened.',
                'version'     => '1.5',
                'type'        => 'Stream'
            ],
            'CreationDate' => [
                'description' => 'The date and time when the annotation was created.',
                'version'     => '1.5',
                'type'        => 'Date' // @todo Date type
            ],
            'ReplyTo' => [
                'field'       => 'IRT',
                'description' => 'The annotation that this annotation is “in reply to.” Both annotations must be on the same page of the document.',
                'version'     => '1.5',
                'type'        => 'IndirectReference'
            ],
            'Subject' => [
                'field'       => 'Subj',
                'description' => 'Text representing a short description of the subject being addressed by the annotation.',
                'version'     => '1.5',
                'type'        => 'String'
            ],
            'ReplyType' => [
                'field'       => 'RT',
                'description' => 'A name specifying the relationship (the “reply type”) between this annotation and one specified by ReplyTo. Can be "R" or "Group".',
                'version'     => '1.6',
                'type'        => 'Name'
            ],
            'Intent' => [
                'field'       => 'IT',
                'description' => 'A name describing the intent of the markup annotation. Intents allow viewer applications to distinguish between different uses and behaviors of a single markup annotation type.',
                'version'     => '1.6',
                'type'        => 'Name'
            ],
            'ExternalData' => [
                'field'       => 'ExData',
                'description' => 'An external data dictionary specifying data to be associated with the annotation.',
                'version'     => '1.7',
                'type'        => 'Dictionary'
            ],
            'BackgroundColor' => [
                'field'       => 'C',
                'description' => 'The background color. A three value array of RGB colors between 0 and 1.',
                'type'        => 'Array'
            ]
        ];
    }

    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Type'] = new ObjectType\PdfName('Annot');
    }
}
