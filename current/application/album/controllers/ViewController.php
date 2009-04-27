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
 * Album_ViewController
 *
 * 顯示相簿內容
 */
class Album_ViewController extends Controller
{
    /**
     * 顯示相簿內容
     */
    public function indexAction()
    {
        $id = $this->getParam('id');
        
        $album = new Model_Album();
        $albumRow = $album->getTable()->find($id)->current();
        if (!$albumRow) {
            $this->redirect('album', '相簿ID無效');
        }
        
        $this->view->album = $album->getAlbumPhotos($id);
        
        // 設定操作欄位
        $this->view->isUploadPhotos = $this->isAllowed('新增相片');
        $this->view->isEditAlbum    = $this->isAllowed('編輯相簿');
        $this->view->isDeleteAlbum  = $this->isAllowed('刪除相簿');
        
        $this->render('index');
    }
    
    /**
     * 顯示相片內容
     */
    public function photoAction()
    {
        $id = $this->getParam('id');

        $photo = new Model_Photo();
        $this->view->photo = $photo->getPhoto($id);

        // 是否允許管理相片
        $this->view->isAdmin = $this->isAllowed('管理相片', false);
        $photoDescriptionForm = new Form_PhotoDescription();
        
        if ($this->isPost() && $this->view->isAdmin) {
            if ($photoDescriptionForm->isValid($_POST)) {
                $photo->addData(array('photoDescription' => $photoDescriptionForm->photoDescription->getValue()));
                $photo->update($id);
            }
            $this->redirect("album/view/photo/id/$id", $photo->getMessage());
        }

        $photoDescriptionForm->photoDescription->setValue($this->view->photo['photoDescription']);
        $this->view->photoDescriptionForm = $photoDescriptionForm;
        
        $this->render('photo');
    }
}
?>
