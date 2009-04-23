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
 * IndexController
 *
 * 顯示首頁
 */
class IndexController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        parent::init();
        $this->view->loginMessage = $this->view->message;
    }
    
    /**
     * 顯示首頁
     */
    public function indexAction()
    {
        // 檢查是否可以發佈新聞
        $this->view->allowAddNews = $this->isAllowed('發佈新聞');
        
        // 讀取新聞區塊
        $news = new Model_News();
        $this->view->newsTable = $news->getNewsList(8);
        
        // 讀取相簿區塊
        $album = new Model_Album();
        $this->view->photos = $album->getRandomPhotos(8);
        
        // 設定日曆
        $dateObj = new Zend_Date();
        $dateObj->set(Date::getDate(), 'yyyy-MM-dd');
        $year        = $dateObj->get(Zend_Date::YEAR_8601);
        $month       = $dateObj->get(Zend_Date::MONTH);
        $daysOfMonth = $dateObj->get(Zend_Date::MONTH_DAYS);
        $this->view->calendarCaption = $year . '年' . $month . '月';
        $this->view->calendar = Date::getRangeDates("$year-$month-01", "$year-$month-$daysOfMonth");;
        
        // 設定待辦事項
        $event = new Model_Event();
        $this->view->events = $event->getEvents("$year-$month-01", "$year-$month-$daysOfMonth");
        
        $this->render('index');
    }
}
?>
