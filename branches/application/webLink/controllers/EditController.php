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
 * WebLink_EditController
 *
 * 新聞網路連結
 */
class WebLink_EditController extends Controller
{
    /**
     * 編輯網路連結
     */
    public function indexAction()
    {
        $id = $this->getParam('id');
        
        // 檢查權限
        $this->isAllowed('管理網路連結', true);
        
        $webLink = new Model_WebLink();
        $webLink->setFormType('edit');
        
         if ($this->isPost()) {
            if ($webLink->isValid()) {
                // 檢查是否需要替換圖示檔
                $iconFileInfo = $webLink->getForm()->iconFile->getTransferAdapter()->getFileInfo();

                if ($iconFileInfo['iconFile']['error'] == 0) {
                    if ($iconHashFile = Image::resize($iconFileInfo['iconFile']['tmp_name'], array(200, 150), false, false)) {
                        // 刪除舊圖檔，插入新資料
                        @unlink(PHOTO_DIR . $webLink->getTable()->getByKey($id)->current()->iconHashFile);
                        $webLink->addData(array('iconHashFile' => $iconHashFile));
                    } else {
                        $imageFail = '，圖檔錯誤，圖示未替換';
                    }
                }
                
                $webLink->update($id);

                // 回到網路連結列表
                $this->redirect('webLink', $webLink->getMessage() . $imageFail);
            } else {
                $this->view->message = $webLink->getMessage();
            }
        } elseif (!$webLink->setFormById($id)) {
            $this->redirect('webLink', $webLink->getMessage());
        }
        
        $this->view->webLinkForm  = $webLink->getForm();
        $this->render('index');
    }
}
?>
