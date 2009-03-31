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
 * Logout_IndexController
 *
 * 執行登出
 */
class Logout_IndexController extends Controller
{
    /**
     * 執行登出
     */
    public function indexAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect('', '登出完成');
    }
}
?>
