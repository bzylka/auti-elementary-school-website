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
 * Model_Title
 *
 * 職稱管理
 */
class Model_Title extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Title';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Title';
    
    /**
     * 取得職稱列表
     */
    public function getTitleTable()
    {
        $titleRowset = $this->getTable()->order(array('officeId', 'displayOrder'))->getRowset();
        foreach ($titleRowset as $titleRow) {
            $titleTable[] = array_merge($titleRow->toArray(),
                                        array('officeName' => $titleRow->findParentRow('Table_Office')->officeName));
        }
        
        return $titleTable;
    }
    
    /**
     * 覆載delete()，設定使用者無所屬職稱
     * @param int $id 職稱ID
     */
    public function delete($id)
    {
        $userRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_User');
        foreach ($userRowset as $userRow) {
            $userRow->titleId = 0;
            $userRow->save();
        }

        parent::delete($id);
    }
}
?>
