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
            //exit('錯誤的呼叫');
        }
    }
    
    /**
     * 取得首頁行事曆
     */
    public function getdefaultcalendarAction()
    {
        if ($date = $this->getParam('date')) {
            if (!Date::isDate($date)) {
                $this->view->message = '錯誤的呼叫，請重新整理頁面';
                $this->render('calendarBlock');
                exit;
            }
        } else {
            $date = Date::getDate();
        }
        
        // 設定日曆
        $dateObj = new Zend_Date();
        $dateObj->set($date, 'yyyy-MM-dd');
        $year        = $dateObj->get(Zend_Date::YEAR_8601);
        $month       = $dateObj->get(Zend_Date::MONTH);
        $daysOfMonth = $dateObj->get(Zend_Date::MONTH_DAYS);
        $this->view->calendarCaption = $year . '年' . $month . '月';
        $this->view->calendar = Date::getRangeDates("$year-$month-01", "$year-$month-$daysOfMonth");;

        // 設定待辦事項
        $event = new Model_Event();
        $this->view->events = $event->getEvents("$year-$month-01", "$year-$month-$daysOfMonth");
        
        // 設定檢視日期
        $this->view->viewDate = "$year-$month-01";
        
        $this->render('calendarBlock');
    }
    
    /**
     * 取得節日清單
     */
    public function getfestivalAction()
    {
        if ($date = $this->getParam('date')) {
            if (!Date::isDate($date)) {
                $this->view->message = '錯誤的呼叫，請重新整理頁面';
                $this->render('calendarBlock');
                exit;
            }
        } else {
            $date = Date::getDate();
        }

        // 設定節日清單
        $dateObj = new Zend_Date();
        $dateObj->set($date, 'yyyy-MM-dd');
        $year        = $dateObj->get(Zend_Date::YEAR_8601);
        $month       = $dateObj->get(Zend_Date::MONTH);
        $daysOfMonth = $dateObj->get(Zend_Date::MONTH_DAYS);
        $festivals   = Date::getFestivals("$year-$month-01", "$year-$month-$daysOfMonth");
        
        if ($festivals === false) {
            $festivals['message'] = '無法取得Google的節日資料';
        } elseif (count($festivals) == 0) {
            $festivals['message'] = '本月無國定節日';
        }

        $this->_helper->json->sendJson($festivals);
    }
}
?>
