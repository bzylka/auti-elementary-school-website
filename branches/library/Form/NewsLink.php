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
 * Form_NewsLink
 *
 * 最新消息連結表單
 */
class Form_NewsLink extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');

        $this->addElement('Text', 'newsLink',
                          array('label'     => '連結網址',
                                'size'      => 35,
                                'maxlength' => 255,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Text', 'newsLinkName',
                          array('label'     => '連結名稱',
                                'size'      => 18,
                                'maxlength' => 40,
                                'stringMin' => 0,
                                'stringMax' => 50));
             ->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => 'history.go(-1)')));
        if ($type == 'edit') {
            $this->addElement('Submit', 'submit', array('label' => '修改'));
        } else {
            $this->addElement('Submit', 'submit', array('label' => '新增'));
        }

        
        //設定分行
        $this->addDisplayGroup(array('linkName'))
             ->addDisplayGroup(array('link'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>