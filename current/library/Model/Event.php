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
 * Model_Event
 *
 * 行事曆項目管理
 */
class Model_Event extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Event';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Event';
    
    /**
     * 取得日期間的事件
     * @param string $startDate 開始日期
     * @param string $endDate   結束日期
     * @retrun obj 事件物件
     */
    public function getEvents($startDate, $endDate)
    {
        $eventRowset = $this->getTable()->where("endDate >= '$startDate' AND startDate <= '$endDate'")->order('startDate')->getRowset();
        $events = array();
        foreach ($eventRowset as $eventRow) {
            $events[] = array_merge($eventRow->toArray(), array('backgroundColor' => $eventRow->findParentRow('Table_EventCatalog')->backgroundColor));
        }
        
        return $events;
    }
}
?>
