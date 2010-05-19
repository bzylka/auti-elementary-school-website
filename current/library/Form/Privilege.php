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
 * Form_Privilege
 *
 * 權限表單
 */
class Form_Privilege extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'privilegeName',
                          array('label'     => '權限名稱',
                                'required'  => true,
                                'size'      => 30,
                                'maxlength' => 30,
                                'stringMin' => 0,
                                'stringMax' => 60));

        if ($this->formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/privilege\'')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('privilegeName'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>