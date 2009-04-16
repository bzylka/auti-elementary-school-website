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
 * Calendar_ViewController
 *
 * 顯示行事曆
 */
class Calendar_ViewController extends Controller
{
    /**
     * 轉向到顯示兩週行事曆
     */
    public function indexAction()
    {
        $this->_forward('by2Week');
    }

    /**
     * 顯示兩週行事曆
     * 參數：date/2009-10-12
     */
    public function by2weekAction()
    {
        if ($date = $this->getParam('date')) {
            if (!Date::isDate($date)) {
                $this->redirect('calendar', '日期設定錯誤');
            }
        } else {
            $date = Date::getDate();
        }

        $date = new Zend_Date();
        $date->set($date, 'YYYY-MM-dd');
        $date->sub($date->get(Zend_Date::WEEKDAY_8601), Zend_Date::DAY);
        echo $date->get('YYYY-MM-dd');exit;
        $calendar = $this->_getDateRangeArray();
        
        // 取得兩週日期
        $date = new Zend_Date();
        $date->set($date, 'YYYY-MM-dd');
        $date->sub($date->get(Zend_Date::WEEKDAY_8601), Zend_Date::DAY);

        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $date->add(1, Zend_Date::DAY);
                $calendar[$i][$j]['date'] = $date->get('YYYY-MM-dd');
            }
        }

        // 取得事件陣列

        // 設定View變數
        
        $this->view->calendar = $calendar;
        $this->render('index');
    }

    /**
     * 顯示月份行事曆
     * 參數：date/2008-10-14
     */
    public function bymonthAction()
    {
        // 算出月的第一天
        $date = new Zend_Date();
        $date->set('2009-03-12', 'YYYY-MM-dd');
        $daysOfMonth = $date->get(Zend_Date::MONTH_DAYS);
        $month = $date->get(Zend_Date::MONTH);

        // 算出最後一天
        $date->set("2009-$month-$daysOfMonth", 'YYYY-MM-dd');
        $afterMonthDays = 7 - $date->get(Zend_Date::WEEKDAY_8601);
        $date->add($afterMonthDays , Zend_Date::DAY);
        $endDay = $date->get('YYYY-MM-dd');
        
        // 算出起始日
        $date->set("2009-$month-1", 'YYYY-MM-dd');
        $preMonthDays = $date->get(Zend_Date::WEEKDAY_8601) - 1;
        $date->sub($preMonthDays, Zend_Date::DAY);
        $startDay = $date->get('YYYY-MM-dd');
        
        for ($i = 0; $i < $preMonthDays; $i++) {
            $date->add(1, Zend_Date::DAY);
            $calendar[$i]['date'] = $date->get('YYYY-MM-dd');
            $calendar[$i]['isPreMonth'] = true;
        }

        for (; $i < ($preMonthDays + $daysOfMonth); $i++) {
            $date->add(1, Zend_Date::DAY);
            $calendar[$i]['date'] = $date->get('YYYY-MM-dd');
        }

        for (; $i < ($preMonthDays + $daysOfMonth + $afterMonthDays); $i++) {
            $date->add(1, Zend_Date::DAY);
            $calendar[$i]['date'] = $date->get('YYYY-MM-dd');
            $calendar[$i]['isAfterMonth'] = true;
        }

        $this->view->calendar = $calendar;
        $this->render('index');
    }

    private function _getDateRangeArray($startDate, $endDate)
    {
        // 取得跟前一週星期天的距離
        $date = new Zend_Date();
        $date->set($startDate, 'YYYY-MM-dd');
        $preStartDate = $date->get(Zend_Date::WEEKDAY_8601);

    }
}
?>
