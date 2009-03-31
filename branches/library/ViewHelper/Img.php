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
 * ViewHelper_Img
 *
 * 產生img標籤
 */
class ViewHelper_Img
{
    /**
     * 產生img標籤
     * @param string $src     圖檔位置
     * @param string $alt     圖檔標題、說明
     * @param array  $attribs 屬性
     * @return string img標籤
     */
    public function img($src, $alt, $attribs = null)
    {
        $alt = htmlentities($alt, ENT_COMPAT, 'UTF-8');
        $img = '<img src="'
             . IMG_URL
             . $src
             . '" title="'
             . $alt
             . '" alt="'
             . $alt
             . '" ';
        
        if (is_array($attribs)) {
            foreach ($attribs as $action => &$method) {
                $img .= $action . '="' . $method . '" ';
            }
        }
        
        return $img . '/>';
    }
}
?>

