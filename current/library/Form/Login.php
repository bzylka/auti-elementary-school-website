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
 * Form_Login
 *
 * 登入表單
 */
class Form_Login extends Form_Abstract
{ 
    /**
     * 建構子
     */
    public function init()
    { 
        $this->setMethod('post');

        $this->addElement('Text', 'account',
                          array('label'     => '帳號',
                                'required'  => true,
                                'size'      => 15,
                                'maxlength' => 15,
                                'validators' => array(array('Alnum', true, array('messages' => '帳號只能使用"英文"和"數字"')))))
             ->addElement('Password', 'password',
                          array('label'     => '密碼',
                                'required'  => true,
                                'size'      => 15,
                                'maxlength' => 15))
             ->addElement('Submit', 'submit',
                          array('label' => '登入'))
             ->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => 'history.go(-1)')));

        $this->addDisplayGroup(array('account'))
             ->addDisplayGroup(array('password'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>