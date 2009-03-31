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
 * NewsTitleOwner
 *
 * 檢查是否為新聞職稱的擁有者
 */
class Acl_Assertion_NewsTitleOwner implements Acl_Assertion_Interface
{
    /**
     * @var int 新聞ID
     * access private
     */
    private $_newsId;
    
    /**
     * 建構子
     * @param int $newsId  新聞ID
     */
    public function __construct($newsId)
    {
        $this->_newsId  = $newsId;
    }
    
    /**
     * 檢查是否允許
     * @return bool 檢查結果
     */
    public function isAllowed()
    {
        $news = new Table_News();
        if ($news->find($this->_newsId)->current()->titleId == Zend_Auth::getInstance()->getIdentity()->titleId) {
            return true;
        } else {
            return false;
        }
    }
}
?>
