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
 * Table_Photo
 *
 * 相片資料表
 */
class Table_Photo extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'photo';
    
     /**
     * 定義關聯
     */
    protected $_referenceMap = array(
        'Album' => array(
            'columns'       => 'albumId',
            'refTableClass' => 'Table_Album',
            'refColumns'    => 'albumId',
            'onDelete'      => self::CASCADE,

        ),
        'User' => array(
            'columns'       => 'userId',
            'refTableClass' => 'Table_User',
            'refColumns'    => 'userId'
        )
    );
}
?>
