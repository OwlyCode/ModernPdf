<?php

/**
 * @category Model
 * @package  ModernPdf\Component\ObjectType
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\ObjectType;

abstract class PdfConstrainedDictionary extends PdfDictionary
{
    protected abstract function getMapping();

    public function __call($name, $arguments)
    {
        if (strpos($name, 'get') === 0) {
            $key = substr($name, 3);
            $mapping = $this->getMapping();

            if (array_key_exists($key, $mapping)) {
                return $this[$mapping[$key]['field'] ?? $key];
            }
        }

        if (strpos($name, 'set') === 0) {
            $key = substr($name, 3);
            $mapping = $this->getMapping();

            if (array_key_exists($key, $mapping)) {

                $class = sprintf('ModernPdf\Component\ObjectType\Pdf%s', $mapping[$key]['type']);

                if (!($arguments[0] instanceof $class)) {
                    $arguments[0] = new $class($arguments[0]);
                }

                $this[$mapping[$key]['field'] ?? $key] = $arguments[0];

                return;
            }
        }

        throw new \RuntimeException(sprintf('Unknown method "%s"', $name));
    }
}
