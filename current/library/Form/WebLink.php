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
 * Form_WebLink
 *
 * 網路連結表單
 */
class Form_WebLink extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addElement('File', 'iconFile',
                          array('label'       => '圖示檔案',
                                'required'    => true,
                                'ignore'      => true,
                                'size'        => 40,
                                'maxFileSize' => 20971520,
                                'fileSize'    => '20MB',
                                'validators'  => array(
                                                   array('Extension', false, 'jpg,gif,png'))))
             ->addElement('Text', 'linkName',
                          array('label'     => '連結名稱',
                                'required'  => true,
                                'size'      => 18,
                                'maxlength' => 40,
                                'stringMin' => 1,
                                'stringMax' => 50))
             ->addElement('Text', 'link',
                          array('label'     => '連結',
                                'required'  => true,
                                'size'      => 35,
                                'maxlength' => 255,
                                'stringMin' => 10,
                                'stringMax' => 255));

        if ($this->_formType == 'edit') {
            $this->iconFile->setRequired(false)
                           ->setLabel('替換圖示');
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'webLink/\'')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('iconFile'))
             ->addDisplayGroup(array('linkName'))
             ->addDisplayGroup(array('link'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>