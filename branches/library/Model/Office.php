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
 * Model_Office
 *
 * 處室管理
 */
class Model_Office extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Office';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Office';
    
    /**
     * 取得處室列表
     * @return array 處室列表
     */
    public function getOfficeList()
    {
        return $this->getTable()->order('displayOrder')->getRowset()->toArray();
    }
    
    /**
     * 取得處室資料
     * @param int $id 處室ID
     * @return array 處室資料
     */
    public function getOfficeData($id)
    {
        // 取得Office資料
        if ($officeRow = $this->getTable()->find($id)->current()) {
            $officeData = $officeRow->toArray();
            
            // 取得組資料
            $select      = $this->getTable()->select()->order('displayOrder');
            $titleRowset = $officeRow->findDependentRowset('Table_Title', 'Office', $select);
            $titleData   = $titleRowset->toArray();
            
            // 取得成員資料
            foreach ($titleRowset as $key => $titleRow) {
                $userRowset = $titleRow->findDependentRowset('Table_User');
                $titleData[$key]['user'] = $userRowset->toArray();
            }
            
            // 合併資料
            $officeData['title'] = $titleData;
            return $officeData;
        } else {
            $this->setMessage('查無處室');
            return false;
        }
    }
    
    /**
     * 覆載delete()，設定職稱無所屬處室
     * @param int $id 處室ID
     */
    public function delete($id)
    {
        $titleRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_Title');
        foreach ($titleRowset as $titleRow) {
            $titleRow->officeId = 0;
            $titleRow->save();
        }

        parent::delete($id);
    }
}
?>
