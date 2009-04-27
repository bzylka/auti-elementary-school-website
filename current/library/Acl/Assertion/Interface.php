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
 * Acl_Assertion_Interface
 *
 * Assertion介面
 */
interface Acl_Assertion_Interface
{
    /**
     * 檢查是否通過
     * @return bool 檢查結果
     */
    public function isAllowed();
}
?>
