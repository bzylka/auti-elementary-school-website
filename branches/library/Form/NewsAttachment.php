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
 * Form_NewsAttachment
 *
 * 最新消息附件表單
 */
class Form_NewsAttachment extends Form_Abstract
{
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');

        $this->addElement('File', 'newsAttachment',
                          array('label'       => '附件檔案',
                                'size'        => 30,
                                'maxFileSize' => 83886080,
                                'fileSize'    => '20MB'))
             ->addElement('Text', 'fileName',
                          array('label'     => '檔名',
                                'size'      => 15,
                                'maxlength' => 50,
                                'stringMin' => 0,
                                'stringMax' => 50))
             ->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => 'history.go(-1)')));

        
        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit', array('label' => '修改'));
        } else {
            $this->addElement('Submit', 'submit', array('label' => '新增'));
            $this->newsAttachment->setRequired(true);
        }
        
        //設定分行
        $this->addDisplayGroup(array('newsAttachment', 'fileName'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>