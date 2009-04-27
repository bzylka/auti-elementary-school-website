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
 * Table_Album
 *
 * 相簿資料表
 */
class Table_Album extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'album';
    
     /**
     * 定義和AlbumYear的關聯
     */
    protected $_referenceMap = array(
        'AlbumYear' => array(
            'columns'       => 'albumYearId',
            'refTableClass' => 'Table_AlbumYear',
            'refColumns'    => 'albumYearId'
        ),
        'CoverPhoto' => array(
            'columns'       => 'coverPhotoId',
            'refTableClass' => 'Table_Photo',
            'refColumns'    => 'photoId'
        )
    );
    
    /**
     * 定義關聯資料表
     */
    protected $_dependentTables = array('Table_Photo');
}
?>
