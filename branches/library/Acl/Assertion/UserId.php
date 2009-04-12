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
 * Acl_Assertion_UserId
 *
 * 檢查是否為某個使用者
 */
class Acl_Assertion_UserId implements Acl_Assertion_Interface
{
    /**
     * @var int 使用者ID
     * access private
     */
    private $_userId;
    
    /**
     * 建構子
     * @param int $newsId  新聞ID
     */
    public function __construct($userId)
    {
        $this->_userId = $userId;
    }
    
    /**
     * 檢查是否允許
     * @return bool 檢查結果
     */
    public function isAllowed()
    {
        $user = new Table_User();
        if ($user->find($this->_userId)->current()->userId == Zend_Auth::getInstance()->getIdentity()->userId) {
            return true;
        } else {
            return false;
        }
    }
}
?>
