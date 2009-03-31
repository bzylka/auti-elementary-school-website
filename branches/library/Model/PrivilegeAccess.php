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
 * Model_PrivilegeAccess
 *
 * 權限存取資源管理
 */
class Model_PrivilegeAccess extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'PrivilegeAccessResource';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'PrivilegeAccess';
    
    /**
     * 讀取資源存取列表
     */
    public function getAccessList()
    {
        $privilege = new Table_Privilege();
        $privilegeRowset = $privilege->getRowset();
        $accessList = array();
        foreach ($privilegeRowset as $privilegeRow) {
            $resourceRowset = $privilegeRow->findManyToManyRowset('Table_Resource', 'Table_PrivilegeAccessResource');
            array_push($accessList, array('privilegeName' => $privilegeRow->privilegeName,
                                          'resource'      => $resourceRowset->toArray()));
        }
        
        return $accessList;
    }
}
?>
