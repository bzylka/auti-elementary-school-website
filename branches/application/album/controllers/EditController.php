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
 * Album_EditController
 *
 * 編輯相簿
 */
class Album_EditController extends Controller
{
    /**
     * 編輯相簿
     */
    public function indexAction()
    {
        $id = $this->getParam('id');
        
        // 檢查權限
        $this->isAllowed('管理相簿', true);
        $album = new Model_Album();

        if ($album->setFormById($id)) {
             if ($this->isPost()) {
                if ($album->isValid()) {
                    //新增資料
                    $album->update($id);
                    $this->redirect('album/view/index/id/' . $id, $album->getMessage());
                } else {
                    $this->view->message = $album->getMessage();
                }
             }
        } else {
            $this->redirect('album', $album->getMessage());
        }
        
        $this->view->albumForm  = $album->getForm();
        $this->render('index');
    }
}
?>
