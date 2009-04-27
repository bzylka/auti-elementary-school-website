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
 * News_ImportantController
 *
 * 顯示重要公告
 */
class News_ImportantController extends Controller
{
    /**
     * 顯示重要公告列表
     */
    public function indexAction()
    {
        // 檢查權限
        $this->view->allowAddNews = $this->isAllowed('發佈新聞');
        
        $news = new Model_News();
        $this->view->newsTable = $news->getImportantNewsList(20);
        $this->render('index');
    }
}
?>
