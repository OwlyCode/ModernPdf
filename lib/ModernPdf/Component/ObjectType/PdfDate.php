<?php
/**
 * @category Model
 * @package  ModernPdf\Component\ObjectType
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ObjectType;

class PdfDate
{
    protected $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    protected function getOffset($colon = false)
    {
        $zone = $this->value->getTimezone();
        $offset = $zone->getOffset($this->value);

        $hours   = round($offset / 3600);
        $minutes = round(($offset % 3600) / 60);

        $hours = $hours < 10 ? '0'.$hours : $hours;
        $minutes = $minutes < 10 ? '0'.$minutes : $minutes;

        return '+'.$hours.($colon ? ':' : '').$minutes;
    }

    public function __toMetadata()
    {
        return $this->value->format('Y-m-d\TH:i:s').$this->getOffset(true);
    }

    public function __toString()
    {
        return '(D:'.$this->value->format('YmdHis').$this->getOffset().')';
    }
}
