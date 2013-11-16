<?php
/**
 * @category Model
 * @package  ModernPdf\Model
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model;

/**
 * The File class, representing the root of a document.
 */
class File
{
    protected $version;
    protected $objects;

    public function __construct($version = "1.7")
    {
        $this->version = $version;
        $this->objects = array();
    }

    public function addObject(\ModernPdf\Model\Object\Object $object)
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
}
