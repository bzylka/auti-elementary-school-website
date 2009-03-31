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
 * Achievement_IndexController
 *
 * 成果專區
 */
class Achievement_IndexController extends Controller
{
    /**
     * 顯示成果專區＆下載檔案
     */
    public function indexAction()
    {
        $achievement = new Model_Achievement();
        $id = $this->getParam('id');
        if ($filePath = urldecode($this->getParam('file'))) {
            $achievement->download($id, $filePath);
        } else {
            $this->view->fileList = $achievement->getFileList($id);
            $this->render('index');
        }
    }
}
?>
