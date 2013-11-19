<?php
/**
 * @category Model
 * @package  ModernPdf\Component\DocumentStructure\Image
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Component\DocumentStructure\Image;

use \ModernPdf\Component\ObjectType;

class Jpeg extends Image
{
    public function setData($data)
    {
        parent::setData($data);

        $infos = getimagesizefromstring($data);

        switch ($infos['channels']) {
            case 3:
                $colorSpace = 'DeviceRGB';
                break;
            case 4:
                $colorSpace = 'DeviceCMYK';
                break;
            default:
                $colorSpace = 'DeviceGray';
                break;
        }

        if ($infos[2] == IMAGETYPE_JPEG) {
            $filter       = 'DCTDecode';
        } elseif ($infos[2] == IMAGETYPE_JPEG2000) {
            $filter       = 'JPXDecode';
        }

        $this->dictionary['ColorSpace'] = new ObjectType\PdfName($colorSpace);
        $this->dictionary['Length'] = strlen($data);
        $this->dictionary['Width'] = $infos[0];
        $this->dictionary['Height'] = $infos[1];
        $this->dictionary['BitsPerComponent'] = $infos['bits'];
        $this->dictionary['Filter'] = new ObjectType\PdfName($filter);
    }
}
