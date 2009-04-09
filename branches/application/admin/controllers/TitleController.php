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
 * Admin_TitleController
 *
 * 管理介面/職稱管理
 */
class Admin_TitleController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 初始Controller
        parent::init();

        // 設定Layout
        $this->_helper->layout->setLayout('admin');
        
        // 檢查權限
        $this->isAllowed('管理介面', true);
    }
    
    /**
     * 顯示職稱列表＆新增職稱
     */
    public function indexAction()
    {
        $title = new Model_Title();

        if ($this->isPost()) {
            if ($title->isValid()) {
                $title->add();
                $this->redirect('admin/title', $title->getMessage());
            } else {
                $this->view->message = $title->getMessage();
            }
        }
        
        $this->view->titleTable = $title->getTitleTable();
        $this->view->titleForm  = $title->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯職稱
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $title = new Model_Title();
        $title->setFormType('edit');
        
        if ($this->isPost()) {
            if ($title->isValid()) {
                $title->update($id);
                $this->redirect('admin/title', $title->getMessage());
            } else {
                $this->view->message = $title->getMessage();
            }
        } elseif (!$title->setFormById($id)) {
            $this->redirect('admin/title', $title->getMessage());
        }

        $this->view->titleTable = $title->getTitleTable();
        $this->view->titleForm  = $title->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除職稱
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $title = new Model_Title();
        $title->delete($id);
        $this->redirect('admin/title', $title->getMessage());
    }
}
?>
