<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Metadata
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Metadata;

use ModernPdf\Component\ObjectType;
use ModernPdf\Component\DataStructure;

/**
 * Represents the document informations dictionary.
 */
class DocumentInformation extends ObjectType\PdfDictionary
{

    public function __construct($values = array())
    {
        parent::__construct($values);
    }

    /**
     * The document’s title. Note that this is nothing to do with any title
     * displayed on the first page.
     *
     * @param ObjectType\PdfString $title The title to set.
     */
    public function setTitle(ObjectType\PdfString $title)
    {
        $this['Title'] = $title;
    }

    /**
     * Gets the title of the document.
     *
     * @return ObjectType\PdfString The title of the document.
     */
    public function getTitle()
    {
        return $this['Title'];
    }

    /**
     * The subject of the document. Again, this is just metadata with no
     * particular rules about content.
     *
     * @param ObjectType\PdfString $subject The subject to set.
     */
    public function setSubject(ObjectType\PdfString $subject)
    {
        $this['Subject'] = $subject;
    }

    /**
     * Gets the subject of the document.
     *
     * @return ObjectType\PdfString The subject of the document.
     */
    public function getSubject()
    {
        return $this['Subject'];
    }

    /**
     * Keywords associated with this document. No advice is given as to how to
     * structure these.
     *
     * @param ObjectType\PdfString $keywords The keywords to set.
     */
    public function setKeywords(ObjectType\PdfString $keywords)
    {
        $this['Keywords'] = $keywords;
    }

    /**
     * Gets the keywords of the document.
     *
     * @return ObjectType\PdfString The keywords of the document.
     */
    public function getKeywords()
    {
        return $this['Keywords'];
    }

    /**
     * The name of the author of the document.
     *
     * @param ObjectType\PdfString $author The author to set.
     */
    public function setAuthor(ObjectType\PdfString $author)
    {
        $this['Author'] = $author;
    }

    /**
     * Gets the author of the document.
     *
     * @return ObjectType\PdfString The author of the document.
     */
    public function getAuthor()
    {
        return $this['Author'];
    }

    /**
     * The date the document was created.
     *
     * @param ObjectType\PdfString $creationDate The creation date to set.
     */
    public function setCreationDate(DataStructure\PdfDate $creationDate)
    {
        $this['CreationDate'] = $creationDate;
    }

    /**
     * Gets the creation date of the document.
     *
     * @return DataStructure\PdfDate The creation date of the document.
     */
    public function getCreationDate()
    {
        return $this['CreationDate'];
    }

    /**
     * The date the document was last modified.
     *
     * @param ObjectType\PdfString $modificationDate The modification date to set.
     */
    public function setModDate(DataStructure\PdfDate $modificationDate)
    {
        $this['ModDate'] = $modificationDate;
    }

    /**
     * Gets the modification date of the document.
     *
     * @return DataStructure\PdfDate The modification date of the document.
     */
    public function getModDate()
    {
        return $this['ModDate'];
    }

    /**
     * The name of the program which originally created this document, if it
     * started as another format (for example, “Microsoft Word”).
     *
     * @param ObjectType\PdfString $creator The creator to set.
     */
    public function setCreator(ObjectType\PdfString $creator)
    {
        $this['Creator'] = $creator;
    }

    /**
     * Gets the creator of the document.
     *
     * @return ObjectType\PdfString The creator of the document.
     */
    public function getCreator()
    {
        return $this['Creator'];
    }

    /**
     * The name of the program which converted this file to PDF, if it started
     * as another format (for example, the format of a word processor).
     *
     * @param ObjectType\PdfString $producer The producer to set.
     */
    public function setProducer(ObjectType\PdfString $producer)
    {
        $this['Producer'] = $producer;
    }

    /**
     * Gets the producer of the document.
     *
     * @return ObjectType\PdfString The producer of the document.
     */
    public function getProducer()
    {
        return $this['Producer'];
    }
}
