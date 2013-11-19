<?php
/**
 * @category Model
 * @package  ModernPdf\Component\FileStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\FileStructure;

use \ModernPdf\Component\ObjectType;

/**
 * Represents the document trailer dictionary. It is not an object that needs
 * to be indentified by an object number and a generation number. It is included
 * in the trailer of the document.
 */
class TrailerDictionary extends ObjectType\PdfDictionary
{
    /**
     * @see Object::__construct()
     */
    public function __construct(ObjectType\PdfIndirectReference $documentCatalog, $crossReferenceTableSize)
    {
        parent::__construct(array(
            'Root' => $documentCatalog,
            'Size' => $crossReferenceTableSize
        ));
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "TrailerDictionary";
    }

    /**
     * Sets the document information indirect reference.
     *
     * @param ObjectType\PdfIndirectReference $documentInformation The document information indirect reference.
     */
    public function setInfo(ObjectType\PdfIndirectReference $documentInformation)
    {
        $this['Info'] = $documentInformation;
    }

    /**
     * Gets the document information indirect reference.
     *
     * @return ObjectType\PdfIndirectReference The document information indirect reference.
     */
    public function getInfo()
    {
        return $this['Info'];
    }

    /**
     * Sets the identifiers for the document.
     *
     * An ID Uniquely identifies the file within a work flow. The first string
     * is decided when the file is first created, the second modified by
     * workflow systems when they modify the file.
     *
     * @param ObjectType\PdfArray $id A two values PdfArray with the ids.
     * @throws InvalidArgumentException If The PdfArray has more than 2 values.
     */
    public function setId(ObjectType\PdfArray $id)
    {
        if (count($id) != 2) {
            throw new \InvalidArgumentException('The TrailerDictionary[ID] must be a two strings array. ' . count($id) . ' found.');
        }
        $this['ID'] = $id;
    }

    /**
     * Returns the document indentifiers.
     * @return ObjectType\PdfArray A 2 values PdfArray which holds the identifiers.
     */
    public function getId()
    {
        return $this['ID'];
    }
}
