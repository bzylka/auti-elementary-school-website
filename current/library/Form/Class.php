<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Form_Class
 *
 * 班級表單
 */
class Form_Class extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addElement('Text', 'className',
                          array('label'     => '班級名稱',
                                'required'  => true,
                                'size'      => 20,
                                'maxlength' => 40,
                                'stringMin' => 2,
                                'stringMax' => 50))
             ->addElement('Text', 'classWebsite',
                          array('label'     => '班級網頁',
                                'size'      => 50,
                                'maxlength' => 255,
                                'stringMin' => 5,
                                'stringMax' => 255));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '修改'));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增班級'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('className'))
             ->addDisplayGroup(array('classWebsite'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>