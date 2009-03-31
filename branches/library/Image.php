<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2008 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Image
 *
 * 圖片處理類別
 */
class Image
{
    /**
     * 調整圖片大小
     * @param mixed  $file          上傳後處理的圖像檔名/圖形物件
     * @param array  $resizeXy      縮圖大小
     * @param array  $thumbXy       拇指圖大小
     * @param bool   $isAspectRatio 是否符合長寬比
     * @return string 儲存後的檔名
     */
    public static function resize($file, $resizeXy, $thumbXy = false, $isAspectRatio = true)
    {
        // 讀取圖檔
        try {
            if (is_string($file)) {
                $image = new Imagick($file);
            } else {
                $image = $file;
            }
        } catch (Exception $e) {
            return false;
        }

        // 判斷副檔名
        $imageFormat = $image->getImageFormat();
        switch ($imageFormat) {
            case 'JPEG':
                $suffix = '.jpg';
                break;
            case 'PNG':
                $suffix = '.png';
                break;
            case 'GIF':
                $suffix = '.gif';
                break;
        }
        
        // 縮圖、寫入圖檔
        $photoHash = Hash::generate();
        $image->thumbnailImage($resizeXy[0], $resizeXy[1], $isAspectRatio);
        $image->writeImage(ROOT_DIR . '/photos/' . $photoHash . $suffix);
        
        // 產生拇指圖
        if (is_array($thumbXy)) {
            $image->thumbnailImage($thumbXy[0], $thumbXy[1], true);
            $image->writeImage(PHOTO_DIR . $photoHash . '_thumb' . $suffix);
        }

        $image->destroy();
        return $photoHash . $suffix;
    }
    
    /**
     * 圖像旋轉
     * @param string $photoFile 要旋轉的圖檔
     * @param int    $degrees   旋轉角度
     * @return bool 結果
     */
    public static function rotate($photoFile, $degrees)
    {
        $image = new Imagick($photoFile);
        if ($image->rotateImage(new ImagickPixel(), $degrees)) {
            return $image->writeImage($photoFile);
        } else {
            return false;
        }
    }
}
?>
