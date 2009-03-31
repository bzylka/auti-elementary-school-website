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
 * WebLink_DeleteController
 *
 * 網路連結刪除
 */
class WebLink_DeleteController extends Controller
{
    /**
     * 刪除網路連結
     */
    public function indexAction()
    {
        // 檢查權限
        $this->isAllowed('管理網路連結', true);
        $webLink = new Model_WebLink();
        $webLink->delete($this->getParam('id'));
        $this->redirect('webLink', $webLink->getMessage());
    }
}
?>
