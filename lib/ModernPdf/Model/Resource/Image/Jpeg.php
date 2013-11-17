<?php
/**
 * @category Model
 * @package  ModernPdf\Model\Resource\Image
 * @author   Tristan Maindron <contact@owly-code.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     http://github.com/OwlyCode/ModernPdf
 */

namespace ModernPdf\Model\Resource\Image;

class Jpeg extends Image
{
    protected $baseType;
    protected $data;

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

        $this->baseType['ColorSpace'] = new \ModernPdf\Model\Type\PdfName($colorSpace);
        $this->baseType['Length'] = strlen($data);
        $this->baseType['Width'] = $infos[0];
        $this->baseType['Height'] = $infos[1];
        $this->baseType['BitsPerComponent'] = $infos['bits'];
        $this->baseType['Filter'] = new \ModernPdf\Model\Type\PdfName($filter);
    }
}
