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
 * Calendar_AjaxController
 *
 * 首頁行事曆AJAX顯示
 */
class Calendar_AjaxController extends Controller
{
    /**
     * 顯示首頁行事曆
     */
    public function indexAction()
    {
        $this->_helper->layout->disableLayout();
        if ($this->_request->isXmlHttpRequest()) {
            /*尚未完成*/
            
        } else {
            echo '錯誤的呼叫';
        }
    }
}
?>
