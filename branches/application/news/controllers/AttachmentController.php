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
 * News_AttachmentController
 *
 * 附件管理
 */
class News_AttachmentController extends Controller
{
    /**
     * 新增附件
     */
    public function addAction()
    {
        $id = $this->getParam('newsId');

        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($id));

        $attachment = new Model_Attachment();

        if ($this->isPost()) {
            if ($attachment->isValid()) {
                if ($fileHash = $attachment->saveAttachment($id)) {
                    if ($userSetFileName = $attachment->getForm()->fileName->getValue()) {
                        if ($ext = pathinfo($_FILES['newsAttachment']['name'], PATHINFO_EXTENSION)) {
                            $ext = '.' . $ext;
                        }
                        $attachment->getForm()->fileName->setValue($userSetFileName . $ext);
                    } else {
                        $attachment->getForm()->fileName->setValue($_FILES['newsAttachment']['name']);
                    }
                    
                    $attachment->addData(array('newsId' => $id, 'fileHash' => $fileHash));
                    $attachment->add();
                    $this->redirect('news/view/index/id/' . $id, $attachment->getMessage());
                } else {
                    $this->view->message = '檔案儲存失敗，請聯絡系統管理員';
                }
            } else {
                $this->view->message = $attachment->getMessage();
            }
        }

        $this->view->attachmentForm  = $attachment->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯附件
     */
    public function editAction()
    {
        $newsId = $this->getParam('newsId');
        $id = $this->getParam('id');

        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($newsId));

        $attachment = new Model_Attachment();
        $attachment->setFormType('edit');
        
        if ($this->isPost()) {
            if ($attachment->isValid()) {
                // 如果有上傳檔案就取代檔案（尚未完成）
                if ($_FILES['newsAttachment']['error'] == '0') {
                    if ($uploadFileName = $attachment->replace($id)) {
                        if ($userSetFileName = $attachment->getForm()->fileName->getValue()) {
                            $uploadFile = new FileInfo($uploadFileName);
                            if ($uploadFile->extension) {
                                $attachment->getForm()->fileName->setValue($userSetFileName . '.' . $uploadFile->extension);
                            } else {
                                $attachment->getForm()->fileName->setValue($userSetFileName);
                            }
                        } else {
                            $attachment->getForm()->fileName->setValue($uploadFileName);
                        }
                    } else {
                        $attachment->setMessage('檔案取代失敗，請聯絡系統管理員');
                    }
                } else {
                    // 如果沒有上傳就只要修改檔名（尚未完成）
                    if ($newFileName = $attachment->getForm()->fileName->getValue()) {
                        $orginFile = new FileInfo($attachment->getTable()->find($id)->current()->fileName);
                        if ($orginFile->extension) {
                            $attachment->getForm()->fileName->setValue($newFileName . '.' . $orginFile->extension);
                        } else {
                            $attachment->getForm()->fileName->setValue($newFileName);
                        }
                    } else {
                        exit('修改檔名不可空白');
                    }
                }
                
                $attachment->update($id);
                $this->redirect('news/view/index/id/' . $newsId, $attachment->getMessage());
            } else {
                $this->view->message = $attachment->getMessage();
            }
        } elseif(!$attachment->setFormById($id)) {
            $this->redirect('news/view/index/id/' . $newsId, $attachment->getMessage());
        }

        $file = new FileInfo($attachment->getForm()->fileName->getValue());
        $attachment->getForm()->fileName->setValue($file->fileName);
        $this->view->attachmentForm = $attachment->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除附件
     */
    public function deleteAction()
    {
        $attachment = new Model_Attachment();
        $attachment->delete($this->getParam('id'));
        $this->redirect('news/view/index/id/' . $this->getParam('newsId'), $attachment->getMessage());
    }
    
    /**
     * 下載附件
     */
    public function downloadAction()
    {
        $attachment = new Model_Attachment();
        $attachment->download($this->getParam('id'));
    }
}
?>
