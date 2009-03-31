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
 * WebLink_AddController
 *
 * 新增網路連結
 */
class WebLink_AddController extends Controller
{
    /**
     * 新增網路連結
     */
    public function indexAction()
    {
        // 檢查權限
        $this->isAllowed('新增網路連結', true);

        $webLink = new Model_WebLink();

        if ($this->isPost()) {
            if ($webLink->isValid()) {
                // 處理上傳圖片
                $iconFileInfo = $webLink->getForm()->iconFile->getTransferAdapter()->getFileInfo();
                if ($iconHashFile = Image::resize($iconFileInfo['iconFile']['tmp_name'], array(150, 75), false, false)) {
                    // 寫入內容
                    $webLink->addData(array('userId'       => Zend_Auth::getInstance()->getIdentity()->userId,
                                            'iconHashFile' => $iconHashFile));
                    $webLink->add();

                    // 回到網路連結列表
                    $this->redirect('webLink', $webLink->getMessage());
                } else {
                    $this->view->message = '圖檔錯誤，可能損壞';
                }
            } else {
                $this->view->message = $webLink->getMessage();
            }
        }

        $this->view->WebLinkForm = $webLink->getForm();
        $this->render('index');
    }
}
?>
