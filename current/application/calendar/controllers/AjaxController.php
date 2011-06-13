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
 * Calendar_AjaxController
 *
 * 首頁行事曆AJAX顯示
 */
class Calendar_AjaxController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 初始Controller
        parent::init();

        // 設定Layout
        $this->_helper->layout->disableLayout();

        // 設定都要進行Ajax呼叫
        if (!$this->_request->isXmlHttpRequest()) {
            exit('錯誤的呼叫');
        }
    }
    
    /**
     * 取得首頁行事曆
     */
    public function getdefaultcalendarAction()
    {
        if ($date = $this->getParam('date')) {
            if (!Zend_Date::isDate($date, 'yyyy-MM')) {
                $this->view->message = '錯誤的呼叫，請重新整理頁面';
                $this->render('calendarBlock');
                exit;
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
        
        // 設定日曆標題、日期
        $this->view->calendarCaption = $year . '年' . $month . '月';
        $this->view->calendar = Date::getRangeDates("$year-$month-01", "$year-$month-$daysOfMonth");;

        // 設定待辦事項
        $event = new Model_Event();
        if (substr(Date::getDate(), 5, 2) == $month) {
            // 如果是本月，則顯示後30天的待辦事項
            $this->view->events = $event->getEvents(Date::getDate(), Date::add(Date::getDate(), 30));
        } else {
            $this->view->events = $event->getEvents("$year-$month-01", "$year-$month-$daysOfMonth");
        }
        
        // 設定本月、今天日期
        $this->view->thisMonth = "$year-$month";
        $this->view->today     = Date::getDate();
        $this->render('calendarBlock');
    }
    
    /**
     * 取得節日清單
     */
    public function getfestivalAction()
    {
        if ($date = $this->getParam('date')) {
            if (!Zend_Date::isDate($date, 'yyyy-MM')) {
                $this->view->message = '錯誤的呼叫，請重新整理頁面';
                $this->render('calendarBlock');
                exit;
            }
        } else {
            $date = Date::getDate();
        }

        // 設定節日清單
        $dateObj = new Zend_Date();
        $dateObj->set($date, 'yyyy-MM');
        $year        = $dateObj->get(Zend_Date::YEAR);
        $month       = $dateObj->get(Zend_Date::MONTH);
        $daysOfMonth = $dateObj->get(Zend_Date::MONTH_DAYS);
        $festivals   = Date::getFestivals("$year-$month-01", "$year-$month-$daysOfMonth");

        if ($festivals == false) {
            $festivals['message'] = '本月無國定節日';
        } elseif ($festivals === 'error') {
            $festivals['message'] = '無法取得Google的節日資料';
        }

        $this->_helper->json->sendJson($festivals);
    }
}
?>
