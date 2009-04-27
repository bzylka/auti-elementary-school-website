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
 * Table_AlbumYear
 *
 * 相簿年度資料表
 */
class Table_AlbumYear extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'albumYear';
    
    /**
     * 定義關聯資料表
     */
    protected $_dependentTables = array('Table_Album');
}
?>
