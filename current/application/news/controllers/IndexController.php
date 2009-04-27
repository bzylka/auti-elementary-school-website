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
 * News_IndexController
 *
 * 顯示最新消息
 */
class News_IndexController extends Controller
{
    /**
     * 顯示最新消息列表
     */
    public function indexAction()
    {
        // 檢查權限
        $this->view->allowAddNews = $this->isAllowed('發佈新聞');
        
        $news = new Model_News();
        $this->view->newsTable = $news->getNewsList(10, $this->getParam('page'));
        $this->render('index');
    }
}
?>
