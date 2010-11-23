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
 * ErrorController
 *
 * 錯誤管理
 */
class ErrorController extends Controller
{
    /**
     * 處理錯誤管理
     */
    public function errorAction()
    {
        // 設定Layout
        $this->_helper->layout->setLayout('error');
        $errors = $this->getParam('error_handler');
        //print_r($errors);exit;
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                // 網址錯誤
                $this->view->message = '抱歉！您輸入的網址不存在';
                break;
            default:
                // 無法存取網址
                $this->view->message = '無法存取這個網址，請洽系統管理員';
                break;
        }

        $this->render('index');
    }
}
?>
