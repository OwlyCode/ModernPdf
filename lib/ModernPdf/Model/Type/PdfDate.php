<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Type
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Type;

class PdfDate
{
    protected $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        $zone = $this->value->getTimezone();
        $offset = $zone->getOffset($this->value);

        $hours   = round($offset / 3600);
        $minutes = round(($offset % 3600) / 60);

        $hours = $hours < 10 ? '0'.$hours : $hours;
        $minutes = $minutes < 10 ? '0'.$minutes : $minutes;

        return '(D:'.$this->value->format('YmdHis').'+'.$hours.$minutes.')';
    }
}
