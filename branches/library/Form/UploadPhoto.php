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
 * Form_UploadPhoto
 *
 * 上傳相片表單
 */
class Form_UploadPhoto extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addElement('File', 'uploadPhotos',
                          array('label'       => '上傳相片',
                                'ignore'      => true,
                                'size'        => 40,
                                'multiFile'   => 6,
                                'maxFileSize' => 1048576000,
                                'fileSize'    => '1000MB',
                                'validators'  => array(
                                                   array('Count', false, array('min' => 1, 'max' => 6)),
                                                   array('Extension', false, 'jpg,png,gif,zip'))))
             ->addElement('Submit', 'submit',
                          array('label' => '上傳'))
             ->addElement('Cancel', 'cancel',
                          array('label' => '取消', 'attribs' => array('onclick' => 'history.go(-1)')));

        //設定分行
        $this->addDisplayGroup(array('uploadPhotos'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>