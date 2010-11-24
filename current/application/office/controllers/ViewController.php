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
 * Office_ViewController
 *
 * 處室檢閱
 */
class Office_ViewController extends Controller
{
    /**
     * 顯示處室檢閱
     */
    public function indexAction()
    {
        $office = new Model_Office();
        if ($this->view->officeData = $office->getOfficeData($this->getParam('id'))) {
            //取得處室列表，提供導覽列使用
            $this->view->officeList = $office->getOfficeList();
            $this->render('index');
        } else {
            $this->redirect('', $office->getMessage());
        }
    }
}
?>
