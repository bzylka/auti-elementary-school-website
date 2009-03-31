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
 * Admin_PrivilegeController
 *
 * 管理介面/權限管理
 */
class Admin_PrivilegeController extends Controller
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
     * 顯示權限列表＆新增權限
     */
    public function indexAction()
    {
        $privilege = new Model_Privilege();

        if ($this->isPost()) {
            if ($privilege->isValid()) {
                $privilege->add();
                $this->redirect('admin/privilege', $privilege->getMessage());
            } else {
                $this->view->message = $privilege->getMessage();
            }
        }

        $this->view->privilegeTable = $privilege->getTable()->getRowset()->toArray();
        $this->view->privilegeForm  = $privilege->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯權限
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $privilege = new Model_Privilege();

        if ($privilege->setFormById($id)) {
            if ($this->isPost()) {
                if ($privilege->isValid()) {
                    $privilege->update($id);
                    $this->redirect('admin/privilege', $privilege->getMessage());
                } else {
                    $this->view->message = $privilege->getMessage();
                }
            }
        } else {
            $this->redirect('admin/privilege', $privilege->getMessage());
        }

        $this->view->privilegeTable = $privilege->getTable()->getRowset()->toArray();
        $this->view->privilegeForm  = $privilege->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除權限
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $privilege = new Model_Privilege();
        $privilege->delete($id);
        $this->redirect('admin/privilege', $privilege->getMessage());
    }
}
?>
