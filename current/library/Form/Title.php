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
 * Form_Title
 *
 * 職稱表單
 */
class Form_Title extends Form_Abstract
{ 
     public function init()
    {
        $this->setMethod('post');
        if ($this->_formType != 'userEdit') {
            $this->addElement('Text', 'titleName',
                              array('label'     => '職稱',
                                    'required'  => true,
                                    'size'      => 10,
                                    'maxlength' => 10,
                                    'stringMin' => 1,
                                    'stringMax' => 10))
                 ->addElement('Text', 'titleEnglishName',
                              array('label'     => '英文名稱',
                                    'required'  => true,
                                    'size'      => 40,
                                    'maxlength' => 50,
                                    'stringMin' => 1,
                                    'stringMax' => 50,
                                    'validators' => array(array('Alpha', true, array('messages' => '職稱英文名稱必須輸入英文',
                                                                                     'allowWhiteSpace' => true)))))
                 ->addElement('Text', 'displayOrder',
                              array('label'     => '顯示順序',
                                    'size'      => 3,
                                    'maxlength' => 2,
                                    'filters'   => array('Int')))
                 ->addElement('Select', 'officeId',
                              array('label'        => '所屬處室',
                                    'required'     => true,
                                    'table'        => 'Office',
                                    'columnPair'   => array('officeId', 'officeName'),
                                    'defaultValue' => array('0' => '無')));
            //設定分行
            $this->addDisplayGroup(array('titleName', 'titleEnglishName'))
                 ->addDisplayGroup(array('officeId', 'displayOrder'));
        }
        $this->addElement('Textarea', 'duty',
                          array('label'     => '職掌',
                                'cols'      => 60,
                                'rows'      => 12,
                                'stringMin' => 0,
                                'stringMax' => 1000));

        if ($this->_formType == 'edit' || $this->_formType == 'userEdit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/title\'')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('duty'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>