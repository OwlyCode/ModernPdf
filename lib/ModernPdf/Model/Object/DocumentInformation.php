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

class DocumentInformation extends Object
{

    public function __construct($objectNumber, $generationNumber = 0)
    {
        $this->baseType = new \ModernPdf\Model\Type\PdfDictionary();
        parent::__construct($objectNumber, $generationNumber);
    }

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

    public function getProducer()
    {
        return $this->baseType['Producer'];
    }
}
