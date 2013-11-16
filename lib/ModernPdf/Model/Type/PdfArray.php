<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Type
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Type;

class PdfArray implements \ArrayAccess
{
    protected $values;

    public function __construct($values = array())
    {
        $this->values = $values;
    }

    public function offsetExists ($offset)
    {
        return array_key_exists($offset, $this->values);
    }

    public function offsetGet ($offset)
    {
        return $this->values[$offset];
    }

    public function offsetSet ($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset ($offset)
    {
        unset($this->values[$offset]);
    }

    public function __toString()
    {
        return '['.implode(' ', $this->values).']';
    }
}
