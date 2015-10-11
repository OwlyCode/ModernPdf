<?php
/**
 * @category Model
 * @package  ModernPdf\Component\FileStructure
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\FileStructure;

/**
 * Represents a basic pdf object. Having a generation number and an object
 * number.
 */
class Object
{
    protected $generationNumber;
    protected $objectNumber;
    protected $baseType;

    /**
     * Creates the object.
     *
     * @param integer $objectNumber     The object number.
     * @param integer $generationNumber The generation number.
     */
    public function __construct($objectNumber, $generationNumber = 0, $baseType = null)
    {
        $this->generationNumber = $generationNumber;
        $this->objectNumber = $objectNumber;
        $this->baseType = $baseType;
    }

    /**
     * Gets the generation number.
     *
     * @return integer The generation number.
     */
    public function getGenerationNumber()
    {
        return $this->generationNumber;
    }

    /**
     * Gets the object number.
     *
     * @return integer The object number.
     */
    public function getObjectNumber()
    {
        return $this->objectNumber;
    }

    /**
     * Gets the base type. The base type is the main PDF Type the object relies
     * on. For example a Document Catalog relies on a Dictionary.
     *
     * The baseType is determined by the class inheriting this one and is used
     * in the data manipulation and the pdf output process.
     *
     * @return mixed The base type.
     */
    public function getBaseType()
    {
        return $this->baseType;
    }
}
