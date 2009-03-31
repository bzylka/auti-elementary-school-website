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
 * Controller
 *
 * 繼承Zend_Controller_Action
 */
class Controller extends Zend_Controller_Action
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 設定ViewScript的路徑
        $moduleName = $this->getRequest()->getModuleName();
        $this->view->setScriptPath(ROOT_DIR . "application/$moduleName/views/");
        
        // 設定訊息
        $this->view->message = current($this->_helper->getHelper('FlashMessenger')->getMessages());
    }
    
    
    /**
     * 檢查是否有存取資源的權限
     * @param string $resourceName 資源名稱
     * @param string $isRedirect   是否要重新導向
     * @param object $assertion    附加條件
     * @return bool 檢查結果
     */
    public function isAllowed($resourceName, $isRedirect = false, $assertion = null)
    {
        $acl = new Acl($resourceName, $assertion);
        if ($acl->isAllowed()) {
            return true;
        } else {
            if ($isRedirect == true) {
                if (Zend_Auth::getInstance()->hasIdentity()) {
                    $this->redirect('error/error', '無法操作《' . $resourceName . '》的功能');
                } else {
                    $this->redirect('login/index/index/returnUrl/' . str_replace('/', '*', $this->getRequest()->getPathInfo()),
                                    '要使用《' . $resourceName . '》的功能，請先登入');
                }
            } else {
                return false;
            }
        }
    }
    
    /**
     * 重新轉向，可設定訊息
     * @param string $url     轉向網址
     * @param string $message 訊息
     */
    public function redirect($url, $message = null)
    {
        if ($message != null) {
            $this->_helper->getHelper('FlashMessenger')->addMessage($message);
        }
        parent::_redirect(BASE_URL . $url);
    }
    
    /**
     * 取得URL變數
     * @param string $paramName 變數名稱
     * @return mixed 變數值
     */
    public function getParam($paramName)
    {
        return parent::_getParam($paramName);
    }
    
    /**
     * 是否有輸入POST資料
     */
    public function isPost()
    {
        return $this->_request->isPost();
    }
    
    /**
     * 取得安全的資料庫輸入
     * @param  string $string 資料庫輸入
     * @return string 處理後的資料庫輸入
     */
    public function quote($string)
    {
        return Zend_Db_Table_Abstract::getDefaultAdapter()->quote($string);
    }
}
?>
