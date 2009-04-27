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
 * WebLink_IndexController
 *
 * 顯示網路連結列表
 */
class WebLink_IndexController extends Controller
{
    /**
     * 顯示網路連結列表
     */
    public function indexAction()
    {
        $this->view->isAdmin = $this->isAllowed('管理網路連結');
        $webLink = new Model_WebLink();
        $this->view->webLinks = $webLink->getwebLinks();
        $this->render('index');
    }
}
?>
