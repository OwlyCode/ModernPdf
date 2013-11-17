<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Object
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Object;

use ModernPdf\Model\Type\PdfString;
use ModernPdf\Model\Type\PdfDate;

/**
 * Represents the document informations dictionary.
 */
class DocumentInformation extends Object
{
    /**
     * @see Object::getType()
     */
    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
    }

    /**
     * @see Object::getType()
     */
    public function getType()
    {
        return "DocumentInformation";
    }

    /**
     * The document’s title. Note that this is nothing to do with any title
     * displayed on the first page.
     *
     * @param PdfString $title The title to set.
     */
    public function setTitle(PdfString $title)
    {
        $this->baseType['Title'] = $title;
    }

    /**
     * Gets the title of the document.
     *
     * @return PdfString The title of the document.
     */
    public function getTitle()
    {
        return $this->baseType['Title'];
    }

    /**
     * The subject of the document. Again, this is just metadata with no
     * particular rules about content.
     *
     * @param PdfString $subject The subject to set.
     */
    public function setSubject(PdfString $subject)
    {
        $this->baseType['Subject'] = $subject;
    }

    /**
     * Gets the subject of the document.
     *
     * @return PdfString The subject of the document.
     */
    public function getSubject()
    {
        return $this->baseType['Subject'];
    }

    /**
     * Keywords associated with this document. No advice is given as to how to
     * structure these.
     *
     * @param PdfString $keywords The keywords to set.
     */
    public function setKeywords(PdfString $keywords)
    {
        $this->baseType['Keywords'] = $keywords;
    }

    /**
     * Gets the keywords of the document.
     *
     * @return PdfString The keywords of the document.
     */
    public function getKeywords()
    {
        return $this->baseType['Keywords'];
    }

    /**
     * The name of the author of the document.
     *
     * @param PdfString $author The author to set.
     */
    public function setAuthor(PdfString $author)
    {
        $this->baseType['Author'] = $author;
    }

    /**
     * Gets the author of the document.
     *
     * @return PdfString The author of the document.
     */
    public function getAuthor()
    {
        return $this->baseType['Author'];
    }

    /**
     * The date the document was created.
     *
     * @param PdfString $creationDate The creation date to set.
     */
    public function setCreationDate(PdfDate $creationDate)
    {
        $this->baseType['CreationDate'] = $creationDate;
    }

    /**
     * Gets the creation date of the document.
     *
     * @return PdfDate The creation date of the document.
     */
    public function getCreationDate()
    {
        return $this->baseType['CreationDate'];
    }

    /**
     * The date the document was last modified.
     *
     * @param PdfString $modificationDate The modification date to set.
     */
    public function setModDate(PdfDate $modificationDate)
    {
        $this->baseType['ModDate'] = $modificationDate;
    }

    /**
     * Gets the modification date of the document.
     *
     * @return PdfDate The modification date of the document.
     */
    public function getModDate()
    {
        return $this->baseType['ModDate'];
    }

    /**
     * The name of the program which originally created this document, if it
     * started as another format (for example, “Microsoft Word”).
     *
     * @param PdfString $creator The creator to set.
     */
    public function setCreator(PdfString $creator)
    {
        $this->baseType['Creator'] = $creator;
    }

    /**
     * Gets the creator of the document.
     *
     * @return PdfString The creator of the document.
     */
    public function getCreator()
    {
        return $this->baseType['Creator'];
    }

    /**
     * The name of the program which converted this file to PDF, if it started
     * as another format (for example, the format of a word processor).
     *
     * @param PdfString $producer The producer to set.
     */
    public function setProducer(PdfString $producer)
    {
        $this->baseType['Producer'] = $producer;
    }

    /**
     * Gets the producer of the document.
     *
     * @return PdfString The producer of the document.
     */
    public function getProducer()
    {
        return $this->baseType['Producer'];
    }
}
