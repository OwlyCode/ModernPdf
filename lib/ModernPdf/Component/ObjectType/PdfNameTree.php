<?php

namespace ModernPdf\Component\ObjectType;

class PdfNameTree extends PdfConstrainedDictionary implements PdfTypeInterface
{
    protected function getMapping()
    {
        return [
            'Kids' => [
                'field'       => 'Pages',
                'description' => 'An array of indirect references to the immediate children of this node.',
                'type'        => 'Array',
            ],
            'Names' => [
                'description' => 'An array of the form [key 1, value 1, key 2, value 2 ... key n, value n]',
                'type'        => 'Array',
            ],
            'Limits' => [
                'description' => 'Least and greatest keys included in the Names array of a leaf node or in the Names arrays of any leaf nodes that are descendants of an intermediate node.',
                'type'        => 'Array',
            ],
        ];
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function add(string $key, $value)
    {
        // Streams are required to be specified as indirect reference.
        $value = $value instanceof PdfStream ? new PdfIndirectReference($value) : $value;

        $names = $this->exportNames();
        $names[$key] = $value;
        $this->importNames($names);
    }

    /**
     * @param array $names
     */
    public function importNames(array $names)
    {
        ksort($names);

        foreach ($names as $key => $value) {
            $this['Names'][] = $key;
            $this['Names'][] = $value;
        }
    }

    /**
     * @return array
     */
    public function exportNames()
    {
        $keys = [];
        $values = [];
        $i = 0;

        foreach ($this['Names'] as $entry) {
            if ($i % 2 == 0) {
                $keys[]= $entry;
            } else {
                $values[]= $entry;
            }

            $i++;
        }

        return array_combine($keys, $values);
    }
}
