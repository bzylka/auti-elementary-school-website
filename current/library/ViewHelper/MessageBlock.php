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
 * ViewHelper_MessageBlock
 *
 * 輸出訊息區塊
 */
class ViewHelper_MessageBlock
{
    /**
     * 輸出訊息區塊
     * @param string $message 區塊內容
     * @return string HTML
     */
    public function messageBlock($message)
    {
        if ($message) {
            $width = mb_strlen($message, 'UTF-8') + 3;
            return '<div class="messageBlock" style="width:' . $width . 'em;">' . $message . '</div>';
        }
    }
}
?>

