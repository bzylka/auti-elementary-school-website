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
 * Form_PhotoDescription
 *
 * 相片描述
 */
class Form_PhotoDescription extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'photoDescription',
                          array('label'     => '相片說明',
                                'size'      => 40,
                                'maxlength' => 255,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Submit', 'submit',
                          array('label' => '儲存說明文字'))
             ->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => '$(\'#photoDescription\').css({\'display\':\'block\'});$(\'.formContainer\').css({\'display\':\'none\'});')));

        //設定分行
        $this->addDisplayGroup(array('photoDescription'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>