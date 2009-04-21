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
 * Model_EventCatalog
 *
 * 事件類別處理
 */
class Model_EventCatalog extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'EventCatalog';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'EventCatalog';
    
    /**
     * 覆載delete()，設定事件無類別
     * @param int $id 事件類別ID
     */
    public function delete($id)
    {
        $eventRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_Event');
        foreach ($eventRowset as $eventRow) {
            $eventRow->eventCatalogId = 0;
            $eventRow->save();
        }

        parent::delete($id);
    }
}
?>
