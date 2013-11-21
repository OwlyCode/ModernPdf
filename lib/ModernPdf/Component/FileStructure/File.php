<?php
/**
 * @category Model
 * @package  ModernPdf\Component\FileStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\FileStructure;

use ModernPdf\Component\ObjectType;

/**
 * The File class, representing the root of a document.
 */
class File
{
    protected $version;
    protected $objects;
    protected $trailerDictionary;
    protected $documentCatalog;
    protected $documentInformation;

    public function __construct($version = "1.7")
    {
        $this->version = $version;
        $this->objects = array();
    }

    public function addObject(Object $object)
    {
        $this->objects[] = $object;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getObjects()
    {
        return $this->objects;
    }

    public function setDocumentCatalog(Object $catalog)
    {
        $this->documentCatalog = $catalog;
    }

    public function setDocumentInformation(Object $information)
    {
        $this->documentInformation = $information;
    }

    public function getTrailerDictionary()
    {
        return $this->trailerDictionary;
    }

    public function prepare()
    {
        if (!$this->documentCatalog) {
            throw new \LogicException('The document has no document catalog.');
        }

        $reference = new ObjectType\PdfIndirectReference($this->documentCatalog);

        // The cross reference table is X objects + 1 special entry long.
        $this->trailerDictionary = new TrailerDictionary($reference, count($this->objects) + 1);

        $id1 = new ObjectType\PdfString(uniqid());
        $id2 = new ObjectType\PdfString(uniqid());
        $id = new ObjectType\PdfArray(array($id1, $id2));

        $this->trailerDictionary->setId($id);

        if ($this->documentInformation) {
            $reference = new ObjectType\PdfIndirectReference($this->documentInformation);
            $this->trailerDictionary->setInfo($reference);
        }
    }
}
