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
 * 顯示管理介面首頁
 */
class Admin_IndexController extends Controller
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
     * 顯示管理介面首頁
     */
    public function indexAction()
    {
        $this->render('index');
    }
}
?>
