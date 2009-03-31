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
 * ViewHelper_AjaxLink
 *
 * 輸出Ajax的超連結
 */
class ViewHelper_AjaxLink
{
    /**
     * 輸出Ajax的超連結
     * @param string $method  執行Ajax請求的Javascript函數
     * @param stirng $content 超連結內容
     * @return string Ajax的超連結
     */
    public function ajaxLink($method, $content)
    {
        $url     = BASE_URL . $url;
        $content = htmlentities($content, ENT_COMPAT, 'UTF-8');
        return '<span class="ajaxLink" onclick="' . $method . '" onkeypress="' . $method . '">' . $content . '</span>';
    }
}
?>

