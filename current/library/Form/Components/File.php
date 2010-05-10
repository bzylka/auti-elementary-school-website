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
 * Form_Components_File
 *
 * 表單組件：上傳檔案：
 */
class Form_Components_File extends Zend_Form_Element_File
{ 
    /**
     * 建構子
     */
    public function __construct($name, $options)
    {
        parent::__construct($name, $options);
        
        $this->addValidator('Size', true, $options['fileSize']);
        
        $sizeValidator = $this->getValidator('Size');
        $sizeValidator->setMessages(array(Zend_Validate_File_Size::TOO_BIG => "上傳檔最多%max%，'%value%'（%size%）超過了"));
        
        $uploadValidator = $this->getValidator('Upload');
        $uploadValidator->setMessages(array(Zend_Validate_File_Upload::INI_SIZE       => "上傳檔超過php.ini設定的大小",
                                            Zend_Validate_File_Upload::FORM_SIZE      => "上傳檔超過表單設定的大小",
                                            Zend_Validate_File_Upload::PARTIAL        => "上傳檔只有部份上傳，請重新上傳",
                                            Zend_Validate_File_Upload::NO_FILE        => "沒有上傳檔案，請重新選擇檔案",
                                            Zend_Validate_File_Upload::NO_TMP_DIR     => "伺服器無法將上傳檔寫入暫存目錄，請聯絡管理員",
                                            Zend_Validate_File_Upload::CANT_WRITE     => "無法寫入上傳檔，請聯絡管理員",
                                            Zend_Validate_File_Upload::EXTENSION      => "擴充套件（extension）回報上傳檔發生錯誤",
                                            Zend_Validate_File_Upload::ATTACK         => "上傳檔不合法，無法儲存",
                                            Zend_Validate_File_Upload::FILE_NOT_FOUND => "找不到上傳檔",
                                            Zend_Validate_File_Upload::UNKNOWN        => "檔案上傳時發生未知錯誤，請聯絡管理員"));
    }
    
    /**
     * 覆載getValue()，防止中文檔名移動錯誤
     */
    public function getValue()
    {
        return true;
    }
}
?>