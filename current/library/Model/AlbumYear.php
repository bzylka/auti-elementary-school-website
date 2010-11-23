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
 * Model_AlbumYear
 *
 * 相簿年份處理
 */
class Model_AlbumYear extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'AlbumYear';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'AlbumYear';

    /**
     * 依照名稱取得相簿年份
     * @return obj 相簿年份的Rowset
     */
    public function getAlbumYears()
    {
        return $this->getTable()->order('albumYearName DESC')->getRowset();
    }

    /**
     * 覆載delete()，設定相簿為無年份
     * @param int $id 相簿ID
     */
    public function delete($id)
    {
        $albumRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_Album');
        foreach ($albumRowset as $albumRow) {
            $albumRow->albumYearId = 0;
            $albumRow->save();
        }

        parent::delete($id);
    }
}
?>
