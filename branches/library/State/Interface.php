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
 * State_Interface
 *
 * 系統狀態檢查介面
 */
interface State_Interface
{
    /**
     * 檢查系統狀態
     */
    public function isValid();
    
    /**
     * 取得訊息
     */
    public function getMessage();
}
?>
