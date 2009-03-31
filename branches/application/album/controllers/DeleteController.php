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
 * Album_DeleteController
 *
 * 刪除相簿、照片
 */
class Album_DeleteController extends Controller
{
    /**
     * 刪除相簿
     */
    public function indexAction()
    {
        // 檢查權限
        $this->isAllowed('刪除相簿', true);
        $album = new Model_Album();
        $album->delete($this->getParam('id'));
        $this->redirect('album', $album->getMessage());
    }
    
    /**
     * 刪除照片
     */
    public function photoAction()
    {
        // 檢查權限
        $this->isAllowed('管理相片', true);
        $photo = new Model_Photo();
        $photo->delete($this->getParam('id'));
        $this->redirect('album/view/index/id/' . $this->getParam('albumId'), $photo->getMessage());
    }
    
    /**
     * 刪除照片描述
     */
    public function photodescriptionAction()
    {
        // 檢查權限
        $this->isAllowed('管理相片', true);
        $photo = new Model_Photo();
        $photo->addData(array('photoDescription' => ''));
        $photo->update($this->getParam('id'));
        $this->redirect('album/view/photo/id/' . $this->getParam('id'), $photo->getMessage());
    }
}
?>
