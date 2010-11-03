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
        $this->view->newsTable = $news->getNewsList(12);
        
        // 讀取相簿區塊
        $album = new Model_Album();
        $this->view->photos = $album->getRandomPhotos(8);
        
        $this->render('index');
    }
}
?>
