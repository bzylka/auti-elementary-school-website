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
 * Form_EventCatalog
 *
 * 事件類別表單
 */
class Form_EventCatalog extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'eventCatalogName',
                          array('label'     => '事件類別名稱',
                                'required'  => true,
                                'size'      => 20,
                                'maxlength' => 50,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Text', 'backgroundColor',
                          array('label'     => '背景顏色',
                                'required'  => true,
                                'size'      => 8,
                                'maxlength' => 7,
                                'stringMin' => 0,
                                'stringMax' => 7,
                                'attribs'   => array('style' => 'color:blue !important'),
                                'value'     => '#ffffff'));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'history.go(-1)')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/eventCatalog\'')));
        }
        
        //設定分行
        $this->addDisplayGroup(array('eventCatalogName', 'backgroundColor'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>