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
 * News_EditController
 *
 * 新聞編輯
 */
class News_EditController extends Controller
{
    /**
     * 編輯新聞
     */
    public function indexAction()
    {
        $id = $this->getParam('id');
        
        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($id));
        
        $news = new Model_News();
        $news->setFormType('edit');

        if ($this->isPost()) {
            if ($news->isValid()) {
                $news->addData(array('postDate' => Date::getDate(), 'postTime' => Date::getTime()));
                $news->update($id);
                $this->redirect('news', $news->getMessage());
            } else {
                $this->view->message = $news->getMessage();
            }
        } elseif (!$news->setFormById($id)) {
            $this->redirect('news', $news->getMessage());
        }
        
        $this->view->newsForm  = $news->getForm();
        $this->render('index');
    }
}
?>
