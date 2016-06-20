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
 * Represents a TextAnnotation.
 */
class TextAnnotation extends Annotation
{
    const ICON_COMMENT       = 'Comment';
    const ICON_HELP          = 'Help';
    const ICON_INSERT        = 'Insert';
    const ICON_KEY           = 'Key';
    const ICON_NEW_PARAGRAPH = 'NewParagraph';
    const ICON_NOTE          = 'Note';
    const ICON_PARAGRAPH     = 'Paragraph';

    const STATE_MODEL_MARKED = 'Marked';
    const STATE_MODEL_REVIEW = 'Review';

    const STATE_MARKED = 'Marked'; // The annotation has been marked by the user.
    const STATE_UNMARKED = 'Unmarked'; // The annotation has not been marked by the user (the default).

    const STATE_ACCEPTED  = 'Accepted'; // The user agrees with the change.
    const STATE_REJECTED  = 'Rejected'; // The user disagrees with the change.
    const STATE_CANCELLED = 'Cancelled'; // The change has been cancelled.
    const STATE_COMPLETED = 'Completed'; // The change has been completed.
    const STATE_NONE      = 'None'; // The user has indicated nothing about the change (the default).

    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Subtype'] = new ObjectType\PdfName(Annotation::TYPE_TEXT);
    }

    protected function getMapping()
    {
        return array_merge(parent::getMapping(), [
            'Open' => [
                'description' => 'A flag specifying whether the annotation should initially be displayed open.',
                'version'     => '1.0',
                'type'        => 'Boolean'
            ],
            'IconName' => [
                'field'       => 'Name',
                'description' => 'The name of an icon to be used in displaying the annotation.',
                'version'     => '1.0',
                'type'        => 'Name'
            ],
            'State' => [
                'description' => 'TThe state to which the original annotation should be set.',
                'version'     => '1.5',
                'type'        => 'String'
            ],
            'StateModel' => [
                'description' => 'The state model corresponding to State',
                'version'     => '1.5',
                'type'        => 'String'
            ],
        ]);
    }
}
