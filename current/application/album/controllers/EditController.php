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
        $this->isAllowed('編輯相簿', true);
        $album = new Model_Album();
        $album->setFormType('edit');
        
        if ($this->isPost()) {
            if ($album->isValid()) {
                $album->update($id);
                $this->redirect('album/view/index/id/' . $id, $album->getMessage());
            } else {
                $this->view->message = $album->getMessage();
            }
        } elseif (!$album->setFormById($id)) {
            $this->redirect('album', $album->getMessage());
        }
        
        $this->view->albumForm = $album->getForm();
        $this->render('index');
    }
}
?>
