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
 * Form_Event
 *
 * 行事曆事件表單
 */
class Form_Event extends Form_Abstract
{ 
     public function init()
    {
        $this->setMethod('post');

        $this->addElement('Text', 'eventName',
                          array('label'     => '事件名稱',
                                'required'  => true,
                                'size'      => 40,
                                'maxlength' => 255,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Text', 'startDate',
                          array('label'     => '開始日期',
                                'required'  => true,
                                'class'     => 'startDate',
                                'size'      => 15,
                                'maxlength' => 10,
                                'stringMin' => 10,
                                'stringMax' => 10,
                                'validators' => array(array('Date', true, array('messages' => '日期格式錯誤')))))
             ->addElement('Text', 'endDate',
                          array('label'     => '結束日期',
                                'required'  => true,
                                'class'     => 'endDate',
                                'size'      => 15,
                                'maxlength' => 10,
                                'stringMin' => 10,
                                'stringMax' => 10,
                                'validators' => array(array('Date', true, array('messages' => '日期格式錯誤')))))
             ->addElement('Textarea', 'eventDescription',
                          array('label'     => '說明',
                                'cols'      => 40,
                                'rows'      => 8,
                                'stringMin' => 0,
                                'stringMax' => 1000))
             ->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => 'history.go(-1)')));
        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '修改'));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增事件'));
        }

        //設定分行
        $this->addDisplayGroup(array('eventName'))
             ->addDisplayGroup(array('startDate', 'endDate'))
             ->addDisplayGroup(array('eventDescription'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>