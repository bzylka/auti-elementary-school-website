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
 * Acl
 *
 * 權限檢查
 */
class Acl
{
    /**
     * @var string 存取資源名稱
     * access private
     */
    private $_resourceName;
    
    /**
     * @var object Assertion
     * access private
     */
    private $_assertion;
    
    /**
     * 建構子
     * @param string $resourceName 資源名稱
     * @param object $assertion    附加條件
     */
    public function __construct($resourceName, $assertion = null)
    {
        $this->_resourceName = $resourceName;
        $this->_assertion    = $assertion;
    }
    
    /**
     * 檢查是否允許權限
     * @return bool 檢查結果
     */
    public function isAllowed()
    {
        // 檢查是否設定超級管理者模式
        if (defined('ADMIN_MODE')) {
            return true;
        }
        
        // 檢查權限是否允許存取資源
        if ($this->_assertion) {
            return $this->_checkResource() | $this->_assertion->isAllowed();
        } else {
            return $this->_checkResource();
        }
    }

    /**
     * 檢查是否允許
     * @return bool 檢查結果
     */
    public function _checkResource()
    {
        $userInfo = Zend_Auth::getInstance()->getIdentity();

        // 檢查是否為管理者
        if ($userInfo->privilegeName == '管理者') {
            return true;
        }

        // 查詢權限是否符合
        $sql = "SELECT privilegeAccessResource.accessId"
             . " FROM privilegeAccessResource, resource"
             . " WHERE privilegeAccessResource.privilegeId = '$userInfo->privilegeId'"
             . " AND resource.resourceName = '$this->_resourceName'"
             . " AND privilegeAccessResource.resourceId = resource.resourceId";
        $accessResult = Zend_Db_Table_Abstract::getDefaultAdapter()->query($sql)->fetchAll();
        return (bool)$accessResult;
    }
}
?>
