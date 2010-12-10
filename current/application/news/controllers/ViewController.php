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
 * News_ViewController
 *
 * 顯示最新消息
 */
class News_ViewController extends Controller
{
    /**
     * 顯示最新消息
     */
    public function indexAction()
    {
        // 取得新聞導向來源，決定回上一頁按鈕的網址
        $backTo = $this->getParam('backTo');
        switch ($backTo) {
            case 'important':
                $this->view->backTo = array('name' => '近期重要公告', 'url' => 'news/important');
                break;
            case 'news':
                $backPage = $this->getParam('backPage');
                $this->view->backTo = array('name' => '最新消息（第' . $backPage . '頁）', 'url' => 'news/index/index/page/' . $backPage);
                break;
            case 'index':
                $this->view->backTo = array('name' => '首頁', 'url' => '');
                break;
            default:
                $this->view->backTo = array('name' => '最新消息', 'url' => 'news');
                break;
        }
        
        $id = $this->getParam('id');
        
        $news = new Model_News();
        $this->view->newsData = $news->getNews($id);
        
        $this->view->isAdmin = $this->isAllowed('管理新聞', false, new Acl_Assertion_NewsTitleOwner($id));
        
        $this->render('index');
    }
}
?>
