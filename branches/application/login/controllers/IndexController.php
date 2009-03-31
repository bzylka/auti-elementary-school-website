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
 * IndexController
 *
 * 顯示首頁
 */
class Login_IndexController extends Controller
{
    /**
     * 顯示登入首頁
     */
    public function indexAction()
    {
        $returnUrl = $this->getParam('returnUrl');

        $login = new Model_Login();
        
        if ($this->isPost()) {
            if ($login->isValid()){
                if ($login->login()) {
                    $this->redirect(str_replace('*', '/', $returnUrl), '登入完成');
                }
            }
            $this->view->message = $login->getMessage();
        }
        
        $this->view->loginForm = $login->getForm();
        $this->render('index');
    }
}
?>
