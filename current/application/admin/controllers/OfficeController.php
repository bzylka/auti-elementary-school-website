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
 * Admin_OfficeController
 *
 * 管理介面/處室管理
 */
class Admin_OfficeController extends Controller
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
     * 顯示處室列表＆新增處室
     */
    public function indexAction()
    {
        $office = new Model_Office();

        if ($this->isPost()) {
            if ($office->isValid()) {
                $office->add();
                $this->redirect('admin/office', $office->getMessage());
            } else {
                $this->view->message = $office->getMessage();
            }
        }
        
        $this->view->officeTable = $office->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->officeForm  = $office->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯處室
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $office = new Model_Office();
        $office->setFormType('edit');

        if ($this->isPost()) {
            if ($office->isValid()) {
                $office->update($id);
                $this->redirect('admin/office', $office->getMessage());
            } else {
                $this->view->message = $office->getMessage();
            }
        } elseif (!$office->setFormById($id)) {
            $this->redirect('admin/office', $office->getMessage());
        }

        $this->view->officeTable = $office->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->officeForm  = $office->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除處室
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $office = new Model_Office();
        $office->delete($id);
        $this->redirect('admin/office', $office->getMessage());
    }
}
?>
