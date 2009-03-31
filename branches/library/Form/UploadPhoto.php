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
    /**
     * 建構子
     * @param string $type 表單類型
     */
    public function __construct($type = null)
    { 
        parent::__construct();
        
        $this->setName('uploadPhotoForm')
             ->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addComponent('UploadPhotos', array('label' => '上傳相片'))
             ->addComponent('Submit', array('label' => '上傳'))
             ->addComponent('Cancel', array('label' => '取消', 'attribs' => array('onclick' => 'history.go(-1)')));

        //設定分行
        $this->addDisplayGroup(array('uploadPhotos'), 'line1', array('order' => 1));
        $this->addDisplayGroup(array('submit', 'cancel'), 'lineEnd', array('order' => 99));
    }
}
?>