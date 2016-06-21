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
            'PageLabels' => [
                'description' => 'Defines the page labeling for the document. The keys in this tree are page indices; the corresponding values are page label dictionaries',
                'type'        => 'NumericTree',
                'version'     => '1.3',
            ],
            'Metadata' => [
                'description' => 'The indirect reference to the metadata.',
                'type'        => 'IndirectReference',
                'version'     => '1.4',
            ],
            'MarkInfo' => [
                'description' => 'A mark information dictionary containing information about the document’s usage of Tagged PDF conventions.',
                'type'        => 'Dictionary',
                'version'     => '1.4',
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
            'Names' => [
                'description' => 'The document’s name dictionary.',
                'version'     => '1.2',
                'type'        => 'Dictionary',
                'structure'   => '' // @todo
            ],
            'Dests' => [
                'description' => ' A dictionary of names and corresponding destinations',
                'version'     => '1.1',
                'type'        => 'Dictionary',
                'structure'   => '' // @todo
            ],
            'ViewerPreferences' => [
                'description' => 'Specifies the way the document is to be displayed on the screen.',
                'version'     => '1.2',
                'type'        => 'Dictionary',
                'structure'   => '' // @todo
            ],
            'PageLayout' => [
                'description' => 'Specifies the page layout to be used when the document is opened.',
                'version'     => '1.0',
                'type'        => 'Name', // @todo constants
            ],
            'PageMode' => [
                'description' => 'Specifies how the document should be displayed when opened.',
                'version'     => '1.0',
                'type'        => 'Name', // @todo constants
            ],
            'Threads' => [
                'description' => 'Represents the document’s article threads',
                'version'     => '1.1',
                'type'        => 'Array',
            ],
            'OpenActionArray' => [
                'field'       => 'OpenAction',
                'description' => 'Specifies a destination to be displayed or an action to be performed when the document is opened.',
                'version'     => '1.1',
                'type'        => 'Array',
            ],
            'OpenActionDictionary' => [
                'field'       => 'OpenAction',
                'description' => 'Specifies a destination to be displayed or an action to be performed when the document is opened.',
                'version'     => '1.1',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'AA' => [
                'description' => 'An additional-actions dictionary defining the actions to be taken in response to various trigger events affecting the document as a whole',
                'version'     => '1.4',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'URI' => [
                'description' => 'A URI dictionary containing document-level information for URI',
                'version'     => '1.1',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'AcroForm' => [
                'description' => 'The document’s interactive form',
                'version'     => '1.2',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'StructTreeRoot' => [
                'description' => 'The document’s structure tree root dictionary',
                'version'     => '1.3',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'Lang' => [
                'description' => ' A language identifier specifying the natural language for all text',
                'version'     => '1.4',
                'type'        => 'String'
            ],
            'SpiderInfo' => [
                'description' => 'A Web Capture information dictionary containing state information used by the Acrobat Web Capture',
                'version'     => '1.3',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'PieceInfo' => [
                'description' => 'A page-piece dictionary associated with the document',
                'version'     => '1.4',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'OCProperties' => [
                'description' => 'The document’s optional content properties dictionary',
                'version'     => '1.5',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'Perms' => [
                'description' => 'A permissions dictionary that specifies user access permissions  for  the  document.',
                'version'     => '1.5',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'Legal' => [
                'description' => 'A dictionary containing attestations regarding the content of a PDF document.',
                'version'     => '1.5',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'Requirements' => [
                'description' => 'An array of requirement dictionaries representing requirements for the document.',
                'version'     => '1.7',
                'type'        => 'Array',
            ],
            'Collection' => [
                'description' => 'A collection dictionary that a PDF consumer uses to enhance the presentation of file attachments.',
                'version'     => '1.7',
                'type'        => 'Dictionary',
                'structure'   => '', // @todo
            ],
            'NeedsRendering' => [
                'description' => 'A flag used to expedite the display of PDF documents containing XFA forms. It specifies whether the document must be regenerated when the document is first opened.',
                'version'     => '1.7',
                'type'        => 'Boolean'
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
