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
 * News_LinkController
 *
 * 新聞連結管理
 */
class News_LinkController extends Controller
{
    /**
     * 新增連結
     */
    public function addAction()
    {
        $id = $this->getParam('newsId');
        
        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($id));
        
        $newsLink = new Model_NewsLink();

        if ($this->isPost()) {
            if ($newsLink->isValid()) {
                $newsLink->addData(array('newsId' => $id));
                $newsLink->add();
                $this->redirect('news/view/index/id/' . $id, $newsLink->getMessage());
            } else {
                $this->view->message = $newsLink->getMessage();
            }
        }
        
        $this->view->newsLinkForm  = $newsLink->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯連結
     */
    public function editAction()
    {
        $newsId = $this->getParam('newsId');
        $id = $this->getParam('id');

        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($newsId));

        $newsLink = new Model_NewsLink();
        $newsLink->setFormType('edit');

        if ($this->isPost()) {
            if ($newsLink->isValid()) {
                $newsLink->addData(array('newsId' => $newsId));
                $newsLink->update($id);
                $this->redirect('news/view/index/id/' . $newsId, $newsLink->getMessage());
            } else {
                $this->view->message = $newsLink->getMessage();
            }
        } elseif (!$newsLink->setFormById($id)) {
            $this->redirect('news/view/index/id/' . $newsId, $newsLink->getMessage());
        }

        $this->view->newsLinkForm  = $newsLink->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除連結
     */
    public function deleteAction()
    {
        $newsLink = new Model_NewsLink();
        $newsLink->delete($this->getParam('id'));
        $this->redirect('news/view/index/id/' . $this->getParam('newsId'), $newsLink->getMessage());
    }
}
?>
