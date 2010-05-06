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
     * 顯示月份行事曆
     * 參數：date/2008-10-14
     */
    public function indexAction()
    {
        $this->view->allowCalendar = $this->isAllowed('行事曆管理');
        
        // 取得日期
        if ($date = $this->getParam('date')) {
            if (!Zend_Date::isDate($date, 'yyyy-MM')) {
                $this->redirect('calendar/view', '日期格式錯誤');
            }
        } else {
            $date = Date::getDate();
        }
        
        // 設定當月
        $dateObj = new Zend_Date();
        $dateObj->set($date, 'yyyy-MM');
        $year        = $dateObj->get(Zend_Date::YEAR);
        $month       = $dateObj->get(Zend_Date::MONTH);
        $daysOfMonth = $dateObj->get(Zend_Date::MONTH_DAYS);

        // 設定前一月、後一月的日期
        $dateObj->add(1, Zend_Date::MONTH);
        $this->view->nextMonthYear = $dateObj->get(Zend_Date::YEAR);
        $this->view->nextMonth     = $dateObj->get(Zend_Date::MONTH);
        $dateObj->sub(2, Zend_Date::MONTH);
        $this->view->preMonthYear = $dateObj->get(Zend_Date::YEAR);
        $this->view->preMonth     = $dateObj->get(Zend_Date::MONTH);

        // 取得當月日期陣列
        $this->view->calendar = Date::getRangeDates("$year-$month-01", "$year-$month-$daysOfMonth");
        
        // 取得當月事件
        $this->view->events   = $this->_getEvents($this->view->calendar['date'][0][0]['date'],
                                                  current(end(end($this->view->calendar['date']))),
                                                  $this->view->calendar);
        $this->view->calendarCaption = $year . '年' . $month . '月行事曆';

        // jQuery參數，取得當月節日和標示今天
        $this->view->thisMonth = $year . '-' . $month;
        $this->view->today     = Date::getDate();
        $this->render('index');
    }
    
    /**
     * 取得事件
     * @param string $startDate 開始日期
     * @param string $endDate   結束日期
     * @param array  $calendar  日期陣列
     * @return array 事件陣列
     */
    private function _getEvents($startDate, $endDate, $calendar)
    {
        $calendarWeeks = count($calendar['date']);

        // 初始事件陣列
        for ($week = 0; $week < $calendarWeeks; $week++) {
            for($day = 0; $day < 7; $day++) {
                for($slot = 0; $slot < 5; $slot++) {
                    $events[$week][$day][$slot] = true;
                }
            }
        }

        // 讀取事件
        $event = new Model_Event();
        $eventArray = $event->getEvents($startDate, $endDate);

        // 處理事件陣列
        foreach ($eventArray as &$eventEntry) {
            $startDate = $eventEntry['startDate'];
            $endFlag   = false;
            for ($week = 0; $week < $calendarWeeks && $endFlag == false; $week++) {
                for ($day = 0; $day < 7; $day++) {
                    if ($startDate > $calendar['date'][$week][$day]['date']) {
                        continue;
                    } else {
                        if ($startDate < $calendar['date'][$week][$day]['date']) {
                            $startDate = $calendar['date'][$week][$day]['date'];
                            $hasPre = true;
                        } else {
                            $hasPre = false;
                        }
                        
                        // 進入事件處理，尋找空的位置（$slot）
                        for ($slot = 0; $slot < 5; $slot++) {
                            if ($events[$week][$day][$slot] === true) {
                                break;
                            }
                        }
                        
                        // 計算和週末的距離
                        $distanceToSunday = Date::sub($calendar['date'][$week][6]['date'], $startDate);
                        $distanceToEnd    = Date::sub($eventEntry['endDate'], $startDate);
                        
                        if ($distanceToEnd > $distanceToSunday) {
                            $colspan   = $distanceToSunday + 1;
                            $hasNext   = true;
                            $startDate = Date::add($startDate, $distanceToSunday);
                        } else {
                            $colspan   = $distanceToEnd + 1;
                            $hasNext   = false;
                            $startDate = Date::add($startDate, $distanceToEnd);
                            $endFlag   = true;
                        }
                        
                        // 儲存Events
                        $events[$week][$day][$slot]            = $eventEntry;
                        $events[$week][$day][$slot]['colspan'] = $colspan;
                        $events[$week][$day][$slot]['hasPre']  = $hasPre;
                        $events[$week][$day][$slot]['hasNext'] = $hasNext;
                        
                        // 設定之後的陣列內容為null
                        for ($endDay = $day + $colspan, $day++; $day < $endDay ; $day++) {
                            $events[$week][$day][$slot] = null;
                        }
                        
                        break;
                    }
                }
            }
        }

        return $events;
    }
}
?>
