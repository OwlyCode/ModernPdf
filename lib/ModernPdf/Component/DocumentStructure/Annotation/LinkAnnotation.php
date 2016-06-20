<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Annotation
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Annotation;

use \ModernPdf\Model\Type;

/**
 * Represents a LinkAnnotation.
 */
class LinkAnnotation extends Annotation
{
    const HIHGLIGHT_NONE = 'N';
    const HIHGLIGHT_INVERT = 'I';
    const HIHGLIGHT_OUTLINE = 'O';
    const HIHGLIGHT_PUSH = 'P';

    public function __construct($values = array())
    {
        parent::__construct($values);

        $this['Subtype'] = new Type\PdfName(Annotation::TYPE_LINK);
    }

    protected function getMapping()
    {
        return array_merge(parent::getMapping(), [
            'Action' => [
                'field'       => 'A',
                'description' => 'An action to be performed when the link annotation is activated.',
                'version'     => '1.1',
                'type'        => 'Boolean'
            ],
            'Destination' => [
                'field'       => 'Dest',
                'description' => 'The name of an icon to be used in displaying the annotation.',
                'version'     => '1.0',
                'type'        => 'Array' // @todo Destination helper ? (Spec says can be array, name or byte string, some WIP in PdfDestination.php)
            ],
            'Highlighting' => [
                'field'       => 'H',
                'description' => 'The annotation’s highlighting mode, the visual effect to be used when the mouse button is pressed or held down inside its active area',
                'version'     => '1.2',
                'type'        => 'Name'
            ],
            'UriAction' => [
                'field'       => 'PA',
                'description' => 'A URI Action associated with the annotation.',
                'version'     => '1.3',
                'type'        => 'Dictionary' //@todo see “URI Actions” on page 662
            ],
            'QuadPoints' => [
                'description' => 'An array of 8 × n numbers specifying the coordinates of n quadrilaterals in default user space that comprise the region in which the link should be activated.',
                'version'     => '1.6',
                'type'        => 'Array'
            ],
        ]);
    }
}
