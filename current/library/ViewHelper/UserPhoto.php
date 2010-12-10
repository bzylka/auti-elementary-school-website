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
 * ViewHelper_UserPhoto
 *
 * 顯示使用者相片
 */
class ViewHelper_UserPhoto
{
    /**
     * 產生img標籤
     * @param int $id 使用者ID
     * @param string $alt 圖檔標題、說明
     * @return string IMG HTML
     */
    public function userPhoto($id, $alt = null)
    {
        if (is_file(PHOTO_DIR . 'user' . $id . '.jpg')) {
            $photo = new ViewHelper_Photo();
            return $photo->photo('user' . $id . '.jpg', $alt);
        } else {
            $img = new ViewHelper_Img();
            return $img->img('noPhoto.png', $alt . '（目前無相片）');
        }
    }
}
?>

