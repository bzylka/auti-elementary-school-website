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
 * Table_PrivilegeAccessResource
 *
 * 資源存取資料表
 */
class Table_PrivilegeAccessResource extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'privilegeAccessResource';
    
    /**
     * 定義和Privilege和Resource的關聯
     */
    protected $_referenceMap = array(
        'Privilege' => array(
            'columns'       => 'privilegeId',
            'refTableClass' => 'Table_Privilege',
            'refColumns'    => 'privilegeId',
            'onDelete'      => self::CASCADE
        ),

        'Resource' => array(
            'columns'       => 'resourceId',
            'refTableClass' => 'Table_Resource',
            'refColumns'    => 'resourceId',
            'onDelete'      => self::CASCADE
        )
    );
}
?>
