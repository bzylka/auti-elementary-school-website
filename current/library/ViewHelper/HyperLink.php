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
 * ViewHelper_HyperLink
 *
 * 輸出超連結
 */
class ViewHelper_HyperLink
{
    /**
     * 輸出超連結
     * @param string $url     超連結url
     * @param stirng $content 超連結內容
     * @param array  $attribs 超連結屬性
     * @return string 超連結HTML
     */
    public function hyperLink($url, $content, $attribs = array())
    {
        $url     = BASE_URL . $url;
        $content = htmlentities($content, ENT_COMPAT, 'UTF-8');
        $html = '<a href="' . $url . '"';

        foreach ($attribs as $key => $value) {
            $html .= ' ' . $key . '="' . $value . '"';
        }

        return $html . ">$content</a>";
    }
}
?>

