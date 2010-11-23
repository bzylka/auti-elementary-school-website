<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Admin_ClasswebsiteController
 *
 * 管理介面/班級網頁
 */
class Admin_ClasswebsiteController extends Controller
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
     * 顯示班級網頁列表＆新增班級
     */
    public function indexAction()
    {
        $class = new Model_Class();

        if ($this->isPost()) {
            if ($class->isValid()) {
                $class->add();
                $this->redirect('admin/classWebsite', $class->getMessage());
            } else {
                $this->view->message = $class->getMessage();
            }
        }
        
        $this->view->classTable = $class->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->classForm  = $class->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯班級
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $class = new Model_Class();
        $class->setFormType('edit');

        if ($this->isPost()) {
            if ($class->isValid()) {
                $class->update($id);
                $this->redirect('admin/classWebsite', $class->getMessage());
            } else {
                $this->view->message = $class->getMessage();
            }
        } elseif (!$class->setFormById($id)) {
            $this->redirect('admin/classWebsite', $class->getMessage());
        }

        $this->view->classTable = $class->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->classForm  = $class->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除班級
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $class = new Model_Class();
        $class->delete($id);
        $this->redirect('admin/classWebsite', $class->getMessage());
    }
}
?>
