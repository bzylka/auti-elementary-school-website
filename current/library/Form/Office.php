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
 * Form_Office
 *
 * 處室表單
 */
class Form_Office extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'officeName',
                          array('label'     => '處室名稱',
                                'required'  => true,
                                'size'      => 10,
                                'maxlength' => 10,
                                'stringMin' => 1,
                                'stringMax' => 20))
             ->addElement('Text', 'displayOrder',
                          array('label'     => '顯示順序',
                                'size'      => 3,
                                'maxlength' => 2,
                                'filters'   => array('Int')))
             ->addElement('Text', 'officeEnglishName',
                          array('label'      => '英文名稱',
                                'required'   => true,
                                'size'       => 30,
                                'maxlength'  => 50,
                                'stringMin'  => 1,
                                'stringMax'  => 50,
                                'validators' => array(array('Alpha', true, array('messages'        => '處室英文名稱必須輸入英文',
                                                                                 'allowWhiteSpace' => true)))))
             ->addElement('Text', 'officeLink',
                          array('label'      => '處室連結',
                                'size'       => 70,
                                'maxlength'  => 255,
                                'stringMin'  => 0,
                                'stringMax'  => 255));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/office\'')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('officeName', 'officeEnglishName', 'displayOrder'))
             ->addDisplayGroup(array('officeLink'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>