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
 * Table_User
 *
 * 使用者資料表
 */
class Table_User extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'user';

    /**
     * 定義關聯
     */
    protected $_referenceMap = array(
        'Title' => array(
            'columns'       => 'titleId',
            'refTableClass' => 'Table_Title',
            'refColumns'    => 'titleId'
        ),
        
        'Privilege' => array(
            'columns'       => 'privilegeId',
            'refTableClass' => 'Table_Privilege',
            'refColumns'    => 'privilegeId'
        )
    );
}
?>
