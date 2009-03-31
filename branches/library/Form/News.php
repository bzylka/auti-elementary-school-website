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
 * Form_News
 *
 * 最新消息表單
 */
class Form_News extends Form_Abstract
{
    public function init()
    {
        $this->setMethod('post');
        
        $this->addElement('Text', 'newsTitle',
                          array('label'     => '標題',
                                'required'  => true,
                                'size'      => 30,
                                'maxlength' => 50,
                                'stringMin' => 0,
                                'stringMax' => 50))
             ->addElement('Checkbox', 'isImportant',
                          array('label' => '重要公告'))
             ->addElement('Textarea', 'newsContent',
                          array('label'     => '內容',
                                'cols'      => 60,
                                'rows'      => 16,
                                'stringMin' => 0,
                                'stringMax' => 500))
             ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'history.go(-1)')));
        // 設定分行
        $this->addDisplayGroup(array('newsTitle', 'isImportant'))
             ->addDisplayGroup(array('newsContent'));
             
        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'));
        } else {
            $this->setAttrib('enctype', 'multipart/form-data');
            
            // 加入新聞連結組件
            for ($i = 1; $i < 3; $i++) {
                $this->addElement('Text', 'newsLink_' . $i,
                                  array('label'     => '連結網址' . $i,
                                        'size'      => 35,
                                        'maxlength' => 255,
                                        'stringMin' => 0,
                                        'stringMax' => 255))
                     ->addElement('Text', 'newsLink_' . $i . '_name',
                                  array('label'     => '連結' . $i . '名稱',
                                        'size'      => 18,
                                        'maxlength' => 40,
                                        'stringMin' => 0,
                                        'stringMax' => 50));
            }
            
            // 加入新聞附件組件
            for ($i = 1; $i < 5; $i++) {
                $this->addElement('File', 'newsAttachment_' . $i,
                                  array('label'       => '附件' . $i,
                                        'size'        => 30,
                                        'maxFileSize' => 83886080,
                                        'fileSize'    => '20MB'))
                     ->addElement('Text', 'newsAttachment_' . $i . '_fileName',
                                  array('label'     => '檔名',
                                        'size'      => 15,
                                        'maxlength' => 50,
                                        'stringMin' => 0,
                                        'stringMax' => 50));
            }
            
            $this->addElement('Submit', 'submit',
                              array('label' => '發布新聞'));
        }
        
        // 設定分行
        $this->addDisplayGroup(array('newsLink_1', 'newsLink_1_name'))
             ->addDisplayGroup(array('newsLink_2', 'newsLink_2_name'))
             ->addDisplayGroup(array('newsAttachment_1', 'newsAttachment_1_fileName'))
             ->addDisplayGroup(array('newsAttachment_2', 'newsAttachment_2_fileName'))
             ->addDisplayGroup(array('newsAttachment_3', 'newsAttachment_3_fileName'))
             ->addDisplayGroup(array('newsAttachment_4', 'newsAttachment_4_fileName'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>