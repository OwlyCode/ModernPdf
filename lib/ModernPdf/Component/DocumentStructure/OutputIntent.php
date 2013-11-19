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

/**
 * Represents a resource dictionary.
 */
class OutputIntent extends ObjectType\PdfDictionary
{
    /**
     * @see Object::__construct()
     */
    public function __construct($values = array())
    {
        parent::__construct($values);
        $this['Type'] = new ObjectType\PdfName('OutputIntent');
    }

    /**
     * Sets the subtype of the output intent.
     *
     * Shall be either one of GTS_PDFX, GTS_PDFA1, ISO_PDFE1 or a key defined by
     * an ISO 32000 extension.
     *
     * @param ObjectType\PdfName $subtype The subtype name.
     */
    public function setSubType(ObjectType\PdfName $subtype)
    {
        $this['S'] = $subtype;
    }

    /**
     * Sets the output condition of the output intent.
     *
     * A text string concisely identifying the intended output device or
     * production condition in human-readable form.
     *
     * @param ObjectType\PdfName $subtype The condition name.
     */
    public function setOutputCondition(ObjectType\PdfString $condition)
    {
        $this['OutputCondition'] = $condition;
    }

    /**
     * Sets the output condition identifier of the output intent.
     *
     * A text string identifying the intended output device or production
     * condition in human- or machinereadable form. If human-readable, this
     * string may be used in lieu of an OutputCondition string for presentation
     * to the user.
     *
     * @param ObjectType\PdfName $subtype The condition identifier.
     */
    public function setOutputConditionIdentifier(ObjectType\PdfString $condition)
    {
        $this['OutputConditionIdentifier'] = $condition;
    }

    /**
     * Sets the registry name of the output intent.
     *
     * An text string (conventionally a uniform resource identifier, or URI)
     * identifying the registry in which the condition designated by
     * OutputConditionIdentifier is defined.
     *
     * @param ObjectType\PdfName $subtype The registry name.
     */
    public function setRegistryName(ObjectType\PdfString $registryName)
    {
        $this['RegistryName'] = $registryName;
    }

    /**
     * Sets the info of the output intent.
     *
     * (Required if OutputConditionIdentifier does not specify a standard
     * production condition; optional otherwise) A human-readable text string
     * containing additional information or comments about the intended target
     * device or production condition.
     *
     * @param ObjectType\PdfName $subtype The info.
     */
    public function setInfo(ObjectType\PdfString $info)
    {
        $this['Info'] = $info;
    }

    /**
     * Sets the output profile indirect reference.
     *
     * (Required if OutputConditionIdentifier does not specify a standard
     * production condition; optional otherwise) An ICC profile stream indirect
     * reference defining the transformation from the PDF document’s source
     * colours to output device colorants.
     *
     * @param ObjectType\PdfIndirectReference $profile The profile indirect reference.
     */
    public function setDestOutputProfile(ObjectType\PdfIndirectReference $profile)
    {
        $this['DestOutputProfile'] = $profile;
    }
}
