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
 * Model_Attachment
 *
 * 最新消息附件處理模組
 */
class Model_Attachment extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'NewsAttachment';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'NewsAttachment';
    
    /**
     * 儲存上傳檔案
     * @param string $file     上傳檔
     * @param string $fileName 儲存檔名
     * @param int    $newsId   新聞ID
     * @return bool 結果
     */
    public function save($news, $newsId)
    {
        
        for ($i = 1; $i < 5; $i++) {
            $newAttachmentFile = $news->getForm()->getElement('newsAttachment_' .  $i);
            if ($newAttachmentFile->isUploaded()) {
                $extension = pathinfo($newAttachmentFile->getValue(), PATHINFO_EXTENSION);
                if ($news->getForm()->{'newsAttachment_' .  $i . '_fileName'}->getValue()) {
                    $fileName = $news->getForm()->getElement('newsAttachment_' .  $i . '_fileName')->getValue();
                } else {
                    $fileName = mb_substr($newAttachmentFile->getValue(), 0, -(strlen($extension)) - 1, 'UTF-8');
                }

                if ($extension) {
                    $fileFullName = $fileName . '.' . $extension;
                } else {
                    $fileFullName = $fileName;
                }

                // 儲存檔案、寫入資料庫
                $hashName = Hash::generate();
                if (!move_uploaded_file($_FILES['newsAttachment_' .  $i]['tmp_name'], DATA_DIR . $hashName)) {
                    $this->setMessage('檔案儲存失敗，請聯絡系統管理員');
                }

                $this->getTable()->addData(array('newsId' => $newsId, 'fileName' => $fileFullName, 'fileHash' => $hashName));
            }
        }
        return 1;
        /*
        foreach ($_FILES as $key => &$file) {
            if ($file['error'] == 0) {
                // 處理檔名
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                if ($news->getForm()->{$key . '_fileName'}->getValue()) {
                    $fileName = $news->getForm()->{$key . '_fileName'}->getValue();
                } else {
                    $fileName = mb_substr($file['name'], 0, -(strlen($extension)) - 1, 'UTF-8');
                }

                if ($extension) {
                    $fileFullName = $fileName . '.' . $extension;
                } else {
                    $fileFullName = $fileName;
                }

                // 儲存檔案、寫入資料庫
                $hashName = Hash::generate();
                if (!move_uploaded_file($file['tmp_name'], DATA_DIR . $hashName)) {
                    $this->setMessage('檔案儲存失敗，請聯絡系統管理員');
                }

                $this->getTable()->addData(array('newsId' => $newsId, 'fileName' => $fileFullName, 'fileHash' => $hashName));
            }
        }
        */
    }
    
    /**
     * 儲存附件檔案
     * @param int $id 附件ID
     */
    public function saveAttachment($id)
    {
        if ($_FILES['newsAttachment']['error'] != 0) {
            return false;
        }

        $hashName = Hash::generate();

        if (!move_uploaded_file($_FILES['newsAttachment']['tmp_name'], DATA_DIR . $hashName)) {
            return false;
        }

        return $hashName;
    }
    
    /**
     * 下載檔案
     * @param int $id 附件ID
     */
    public function download($id)
    {
        $attachmentRow = $this->getTable()->find($id)->current();
        $fileHash = $attachmentRow->fileHash;
        $fileName = $attachmentRow->fileName;
        
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; Filename="' . $fileName . '"');
        echo file_get_contents(DATA_DIR . $fileHash);
        exit;
    }
    
    /**
     * 取代附件檔案
     * @param int $id 附件ID
     */
    public function replace($id)
    {
        if ($_FILES['newsAttachment']['error'] != 0) {
            return false;
        }

        $attachmentRow = $this->getTable()->find($id)->current();
        
        if (!move_uploaded_file($_FILES['newsAttachment']['tmp_name'], DATA_DIR . $attachmentRow->fileHash)) {
            return false;
        }
        
        return mb_convert_encoding($_FILES['newsAttachment']['name'], 'UTF-8', 'Big5');
    }
    
    /**
     * 刪除附件檔案
     * @param int $id 附件ID
     */
    public function delete($id)
    {
        $attachmentRow = $this->getTable()->find($id)->current();
        @unlink(DATA_DIR . $attachmentRow->fileHash);
        parent::delete($id);
    }
}
?>
