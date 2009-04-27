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
 * Acl_Assertion_HasTitleId
 *
 * 檢查是否為某組的擁有者
 */
class Acl_Assertion_HasTitleId implements Acl_Assertion_Interface
{
    /**
     * @var int 職稱ID
     * access private
     */
    private $_titleId;
    
    /**
     * 建構子
     * @param int $newsId 職稱ID
     */
    public function __construct($titleId)
    {
        $this->_titleId = $titleId;
    }
    
    /**
     * 檢查是否允許
     * @return bool 檢查結果
     */
    public function isAllowed()
    {
        if ($this->_titleId == Zend_Auth::getInstance()->getIdentity()->titleId) {
            return true;
        } else {
            return false;
        }
    }
}
?>
