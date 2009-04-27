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
        $id = $this->getParam('id');
        
        $news = new Model_News();
        $this->view->newsData = $news->getNews($id);
        
        $this->view->isAdmin = $this->isAllowed('管理新聞', false, new Acl_Assertion_NewsTitleOwner($id));
        
        $this->render('index');
    }
}
?>
