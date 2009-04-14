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
     * 參數：year/2009/week/2
     */
    public function by2weekAction()
    {
        // 算出週的第一天
        $date = new Zend_Date();
        $date->set('2009-04-12', 'YYYY-MM-dd');
        $date->sub($date->get(Zend_Date::WEEKDAY_8601), Zend_Date::DAY);
        for ($i = 0; $i < 14; $i++) {
            $date->add(1, Zend_Date::DAY);
            $calendar[$i]['date'] = $date->get('YYYY-MM-dd');

        }

        $this->view->calendar = $calendar;
        $this->render('index');
    }

    /**
     * 顯示兩週行事曆
     * 參數：year/2009/week/2
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

        // 算出起始日
        $date->set("2009-$month-1", 'YYYY-MM-dd');
        $preMonthDays = $date->get(Zend_Date::WEEKDAY_8601) - 1;

        // 填入陣列
        $date->sub($preMonthDays + 1, Zend_Date::DAY);

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

    private function _initCalendar()
    {

    }
}
?>
