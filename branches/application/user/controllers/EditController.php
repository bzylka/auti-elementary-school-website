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
 * User_EditController
 *
 * 修改個人資料
 */
class User_EditController extends Controller
{
    /**
     * 修改個人資料
     */
    public function indexAction()
    {
        $id = $this->getParam('id');

        // 檢查權限
        //$this->isAllowed('', true, new Acl_Assertion_UserId($id));

        $user = new Model_User();
        $user->setFormType('userEdit');

        if ($this->isPost()) {
            if ($user->isValid()) {
                // 處理密碼
                $password = $user->getForm()->getValue('password');
                if ($password) {
                    $salt = Hash::generate();
                    $user->addData(array('salt' => $salt));
                    $user->getForm()->password->setValue(Hash::generate($password . $salt));
                } else {
                    $user->getForm()->removeEmptyElement('password');
                }
                
                $user->update($id);
                $this->redirect('', $user->getMessage());
            } else {
                $this->view->message = $user->getMessage();
            }
        } elseif (!$user->setFormById($id)) {
            $this->redirect('', $user->getMessage());
        }

        $this->view->userData = $user->getTable()->find($id)->current()->toArray();
        $this->view->userForm = $user->getForm();
        $this->render('index');
    }
}
?>
