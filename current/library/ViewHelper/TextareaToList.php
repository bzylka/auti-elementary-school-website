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
 * ViewHelper_TextareaToList
 *
 * 將文字區域的內容轉成list
 */
class ViewHelper_TextareaToList
{
    /**
     * 將文字區域的內容轉成list
     * @param string $string 字串
     * @return string HTML內容
     */
    public function textareaToList($string)
    {
        if ($string) {
            return '<ul><li>' . str_replace(array("\r\n", "\r", "\n"), '</li><li>', $string) . '</li></ul>';
        } else {
            return null;
        }
    }
}
?>

