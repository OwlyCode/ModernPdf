<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

use ModernPdf\Model\Resource\Font;
use ModernPdf\Model\Type;

/**
 * Represents a resource dictionary.
 */
class OutputIntent extends Object
{
    /**
     * @see Object::__construct()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new Type\PdfDictionary();
        $this->baseType['Type'] = new Type\PdfName('OutputIntent');
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "OutputIntent";
    }

    /**
     * Sets the subtype of the output intent.
     *
     * Shall be either one of GTS_PDFX, GTS_PDFA1, ISO_PDFE1 or a key defined by
     * an ISO 32000 extension.
     *
     * @param Type\PdfName $subtype The subtype name.
     */
    public function setSubType(Type\PdfName $subtype)
    {
        $this->baseType['S'] = $subtype;
    }

    /**
     * Sets the output condition of the output intent.
     *
     * A text string concisely identifying the intended output device or 
     * production condition in human-readable form.
     *
     * @param Type\PdfName $subtype The condition name.
     */
    public function setOutputCondition(Type\PdfString $condition)
    {
        $this->baseType['OutputCondition'] = $condition;
    }

    /**
     * Sets the output condition identifier of the output intent.
     *
     * A text string identifying the intended output device or production 
     * condition in human- or machinereadable form. If human-readable, this 
     * string may be used in lieu of an OutputCondition string for presentation
     * to the user.
     *
     * @param Type\PdfName $subtype The condition identifier.
     */
    public function setOutputConditionIdentifier(Type\PdfString $condition)
    {
        $this->baseType['OutputConditionIdentifier'] = $condition;
    }

    /**
     * Sets the registry name of the output intent.
     *
     * An text string (conventionally a uniform resource identifier, or URI) 
     * identifying the registry in which the condition designated by 
     * OutputConditionIdentifier is defined.
     *
     * @param Type\PdfName $subtype The registry name.
     */
    public function setRegistryName(Type\PdfString $registryName)
    {
        $this->baseType['RegistryName'] = $registryName;
    }

    /**
     * Sets the info of the output intent.
     *
     * (Required if OutputConditionIdentifier does not specify a standard 
     * production condition; optional otherwise) A human-readable text string 
     * containing additional information or comments about the intended target 
     * device or production condition. 
     *
     * @param Type\PdfName $subtype The info.
     */
    public function setInfo(Type\PdfString $info)
    {
        $this->baseType['Info'] = $info;
    }

    /**
     * Sets the output profile indirect reference.
     *
     * (Required if OutputConditionIdentifier does not specify a standard 
     * production condition; optional otherwise) An ICC profile stream indirect 
     * reference defining the transformation from the PDF document’s source 
     * colours to output device colorants.
     * 
     * @param Type\PdfIndirectReference $profile The profile indirect reference.
     */
    public function setDestOutputProfile(Type\PdfIndirectReference $profile)
    {
        $this->baseType['DestOutputProfile'] = $profile;
    }
}
