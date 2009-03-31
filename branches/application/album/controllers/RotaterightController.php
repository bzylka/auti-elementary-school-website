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
 * Album_RotaterightController
 *
 * 右旋轉相片
 */
class Album_RotaterightController extends Controller
{
    /**
     * 顯示相簿列表
     */
    public function photoAction()
    {
        // 檢查權限
        $this->isAllowed('管理相片', true);
        $photo = new Model_Photo();
        $message = $photo->rotate($this->getParam('id'), 90);
        $this->redirect('/album/view/photo/id/' . $this->getParam('id'), $message);
    }
}
?>
