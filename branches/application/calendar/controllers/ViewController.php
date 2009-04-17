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

        // 設定日期範圍
        $dateObj = new Zend_Date();
        $dateObj->set($date, 'YYYY-MM-dd');
        $dateObj->sub($dateObj->get(Zend_Date::WEEKDAY_8601) - 1, Zend_Date::DAY);
        $satrtDate = $dateObj->get('YYYY-MM-dd');
        $endDate   = Date::add($satrtDate, 13);
        $calendar  = $this->_getDateRangeArray($satrtDate, $endDate);
        
        // 初始事件陣列
        for ($row = 0; $row < count($calendar['date']); $row++) {
            for($i = 0; $i < 7; $i++) {
                for($j = 0; $j < 5; $j++) {
                    $events[$row][$i][$j] = true;
                }
            }
        }
        
        $event = new Model_Event();
        $eventRowset = $event->getTable()->where("endDate >= '$satrtDate' AND startDate <= '$endDate'")->order('startDate')->getRowset();
        foreach ($eventRowset as $eventRow) {
            for ($startDate = $eventRow->startDate; $startDate < $eventRow->endDate; $startDate = Date::add($startDate, 1)) {
                for ($row = 0; $row < count($calendar['date']) && $startDate < $eventRow->endDate;$row++) {
                    for ($i = 0; $i < 7 && $startDate < $eventRow->endDate; $i++) {
                        if ($startDate > $calendar[$row][$i]) {
                            continue;
                        } else {
                            if ($startDate < $calendar[$row][$i]) {
                                $startDate = $calendar[$row][$i];
                                $hasPre = true;
                            }

                            // 計算跟星期天的差距
                            $distanceToSunday = Date::sub($calendar[$row][6], $startDate);
                            $distanceToEnd    = Date::sub($eventRow->endDate, $startDate);

                            //取得可用的位置
                            for($j = 0; $j < 5; $j++) {
                                if ($events[$row][$i][$j] === true) {
                                    break;
                                }
                            }


                            if ($distanceToEnd > $distance) {
                                $events[$row][$i][$j]['colspan'] = $distanceToSunday;
                                $events[$row][$i][$j]['hasNext'] = true;
                                $startDate = Date::add($startDate, $distanceToSunday);
                            } else {
                                $events[$row][$i][$j]['colspan']  = $distanceToEnd;
                                $events[$row][$i][$j]['leftDays'] = $distanceToSunday - $distanceToEnd;
                                $startDate = Date::add($startDate, $distanceToEnd);
                            }
                            
                            $events[$row][$i][$j]//尚未完成
                        }
                    }
            }
        }

        // 取得事件陣列
        $event = new Model_Event();
        $eventRowset = $event->getTable()->where("endDate >= '$satrtDate' AND startDate <= '$endDate'")->order('startDate')->getRowset();
        foreach ($eventRowset as $eventRow) {
            for ($startDate = $eventRow->startDate; $startDate < $eventRow->endDate; $startDate = Date::add($startDate, 1)) {
                 for ($row = 0; $row < count($calendar['date']) && $startDate < $eventRow->endDate;$row++) {
                    for ($i = 0; $i < 7 && $startDate < $eventRow->endDate; $i++) {
                        if ($startDate > $calendar[$row][$i]) {
                            continue;
                        }
                        
                        if ($startDate < $calendar[$row][$i]) {
                            $startDate = $calendar[$row][$i];
                            $events[$row][$i][]['hasPre'] = true;
                        }

                        // 計算跟星期天的差距
                        $distanceToSunday = Date::sub($calendar[$row][6], $startDate);
                        $distanceToEnd    = Date::sub($eventRow->endDate, $startDate);

                        if ($distanceToEnd > $distance) {
                            $events[$row][$i][]['colspan'] = $distanceToSunday;
                            $events[$row][$i][]['hasNext'] = true;
                            $startDate = Date::add($startDate, $distanceToSunday);
                        } else {
                            $events[$row][$i][]['colspan']  = $distanceToEnd;
                            $events[$row][$i][]['leftDays'] = $distanceToSunday - $distanceToEnd;
                            $startDate = Date::add($startDate, $distanceToEnd);
                        }
                    }
                }
            }
        }
        /*
        echo '<hr />';
        print_r($events);
        echo '<hr />';
        print_r($calendar);
        echo '<hr />';
        print_r($eventRowset->toArray());exit;
        */
        // 設定View變數
        $this->view->calendar = $calendar;
        $this->view->events   = $events;
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
        // 取得跟前一週星期天的距離、日期
        $date = new Zend_Date();
        $date->set($startDate, 'YYYY-MM-dd');
        $preStartDays = $date->get(Zend_Date::WEEKDAY_8601) - 1;
        $preStartDate = Date::add($startDate, -$preStartDays);

        // 取得跟最後一週星期天的距離
        $date->set($endDate, 'YYYY-MM-dd');
        $afterStartDays = 7 - $date->get(Zend_Date::WEEKDAY_8601);
        $afterStartDate = Date::add($endDate, $afterStartDays);

        // 回傳陣列
        $row = 0;
        $calendar['preStartDays']   = $preStartDays;
        $calendar['preDate']        = Date::add($preStartDate, -1);
        $calendar['afterStartDays'] = $afterStartDays;
        $calendar['afterDate']      = Date::add($afterStartDate, 1);
        
        for ($i = 0; $preStartDate <= $afterStartDate; $i++, $preStartDate = Date::add($preStartDate, 1)) {
            if ($i > 0 && $i % 7 == 0) {
                $row++;
                $i = 0;
            }
            $calendar['date'][$row][$i] = $preStartDate;
        }

        return $calendar;
    }
}
?>
