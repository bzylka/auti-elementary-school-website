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
        if ($this->getParam('page')) {
            $page = $this->getParam('page');
        } else {
            $page = 0;
        }

        $result = $news->getNewsListWithPages(18, $page);

        $this->view->newsTable = $result['newsTable'];
        $this->view->paginator = $result['paginator'];

        // 設定最新消息返回頁面
        if (!$this->view->backPage = $this->getParam('page')) {
            $this->view->backPage = 1;
        }
        $this->render('index');
    }
}
?>
