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
 * Model_Calendar
 *
 * 行事曆管理
 */
class Model_Calendar extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Event';
    
    /**
     * 取得事件列表with月曆（用於首頁）
     * @return array 處室列表
     */
    public function getEventListWithCalendar()
    {
        $result['calendar'] = $this->_getCalendar('month');
        
        
        $beginDate = implode('-', array($this->_year, $this->_month, '00'));
        $endDate   = implode('-', array($this->_year, $this->_month, '32'));
        $result['evenList'] = $this->getTable()->where("startDate > $beginDate AND startDate < $endDate")
    }
}
?>
