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
 * Admin_AccessresourceController
 *
 * 管理介面/資源存取管理
 */
class Admin_AccessresourceController extends Controller
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
     * 顯示資源存取列表＆新增資源存取
     */
    public function indexAction()
    {
        $privilegeAccess = new Model_PrivilegeAccess();
        
        if ($this->isPost()) {
            if ($privilegeAccess->isValid()) {
                $privilegeAccess->add();
                $this->redirect('admin/accessResource', $privilegeAccess->getMessage());
            } else {
                $this->view->message = $privilegeAccess->getMessage();
            }
        }
        
        // 讀取資源存取列表
        $this->view->accessList          = $privilegeAccess->getAccessList();
        $this->view->privilegeAccessForm = $privilegeAccess->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除資源
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $privilegeAccess = new Model_PrivilegeAccess();
        $privilegeAccess->delete($id);
        $this->redirect('admin/accessResource', $privilegeAccess->getMessage());
    }
}
?>
