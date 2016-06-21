<?php

namespace ModernPdf\Component\ObjectType;

class PdfNumericTree extends PdfConstrainedDictionary implements PdfTypeInterface
{
    protected function getMapping()
    {
        return [
            'Kids' => [
                'field'       => 'Pages',
                'description' => 'An array of indirect references to the immediate children of this node.',
                'type'        => 'Array',
            ],
            'Nums' => [
                'description' => 'An array of the form [key 1, value 1, key 2, value 2 ... key n, value n]',
                'type'        => 'Array',
            ],
            'Limits' => [
                'description' => 'Least and greatest keys included in the Names array of a leaf node or in the Names arrays of any leaf nodes that are descendants of an intermediate node.',
                'type'        => 'Array',
            ],
        ];
    }
}
