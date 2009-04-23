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
     * 顯示首頁行事曆
     */
    public function indexAction()
    {
        $this->_helper->layout->disableLayout();
        if ($this->_request->isXmlHttpRequest()) {
            if ($date = $this->getParam('date')) {
                if (!Date::isDate($date)) {
                    $this->view->message = '錯誤的呼叫，請重新整理頁面';
                    $this->render('index');
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
            
            $this->render('index');
        } else {
            echo '錯誤的呼叫';
        }
    }
}
?>
