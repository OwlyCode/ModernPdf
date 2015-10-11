<?php
/**
 *
 * @category Model
 * @package  ModernPdf\Model
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\View;

class CrossReferenceGenerator
{
    /**
     * @param Object[] $objects
     * @param integer  $byteOffset
     *
     * @return string
     */
    public function generate(array $objects, $byteOffset = 0)
    {
        $crossReferenceTable  = "xref\n";
        $crossReferenceTable .= "0 ".(count($objects)+1)."\r\n";
        $crossReferenceTable .= "0000000000 65535 f\r\n";

        foreach ($objects as $object) {
            $crossReferenceTable .= sprintf('%010s', $byteOffset)." 00000 n\r\n";
            $byteOffset += strlen($object);
        }

        return $crossReferenceTable;
    }
}
