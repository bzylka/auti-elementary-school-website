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
 * Admin_UserController
 *
 * 管理介面/使用者管理
 */
class Admin_UserController extends Controller
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
     * 顯示使用者列表＆新增使用者
     */
    public function indexAction()
    {
        $user = new Model_User();

        if ($this->isPost()) {
            if ($user->isValid()) {
                // 檢查帳號重複

                // 處理密碼
                $password = $user->getForm()->getValue('password');
                $salt     = Hash::generate();
                $user->addData(array('salt' => $salt, 'photo' => Hash::generate()));
                $user->getForm()->password->setValue(Hash::generate($password, $salt));
                
                $user->add();
                $this->redirect('admin/user', $user->getMessage());
            } else {
                $this->view->message = $user->getMessage();
            }
        }

        $this->view->userTable = $user->getUserTable();
        $this->view->userForm  = $user->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯使用者
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $user = new Model_User();

        if ($user->setFormById($id)) {
            if ($this->isPost()) {
                if ($user->isValid()) {
                    // 檢查帳號重複

                    // 處理密碼
                    $password = $user->getForm()->getValue('password');
                    if ($password) {
                        $salt = Hash::generate();
                        $user->addData(array('salt' => $salt, 'photo' => Hash::generate()));
                        $user->getForm()->password->setValue(Hash::generate($password, $salt));
                    } else {
                        $user->getForm()->removeEmptyElement('password');
                    }

                    $user->update($id);
                    $this->redirect('admin/user', $user->getMessage());
                } else {
                    $this->view->message = $user->getMessage();
                }
            }
        } else {
            $this->redirect('admin/user', $user->getMessage());
        }

        $this->view->userTable = $user->getUserTable();
        $this->view->userForm  = $user->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除使用者
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $user = new Model_User();
        $user->delete($id);
        $this->redirect('admin/user', $user->getMessage());
    }
}
?>
