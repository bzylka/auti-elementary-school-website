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
 * Form_User
 *
 * 使用者表單
 */
class Form_User extends Form_Abstract
{ 
    /**
     * 建構子
     * @param string $type 表單類型
     */
    public function __construct($type = null)
    { 
        parent::__construct();
        
        $this->setName('userForm')
             ->setMethod('post');

        $this->addComponent('UserName', array('label' => '使用者姓名', 'required' => true))
             ->addComponent('UserEnglishName', array('label' => '英文姓名'))
             ->addComponent('Account', array('label' => '帳號', 'required' => true))
             ->addComponent('PasswordConfirm', array('label' => '確認密碼'))
             ->addComponent('Email', array('label' => 'E-mail'))
             ->addComponent('TitleId', array('label' => '職稱'))
             ->addComponent('PrivilegeId', array('label' => '權限'))
             ->addComponent('Education', array('label' => '學歷'))
             ->addComponent('Experience', array('label' => '經歷'))
             ->addComponent('Talk', array('label' => '想說的話'))
             ->addComponent('IsLeader', array('label' => '主任/校長'));

        if ($type == 'edit') {
            $this->addComponent('Password', array('label' => '變更密碼', 'allowEmpty' => true))
                 ->addComponent('Submit', array('label' => '更新'))
                 ->addComponent('Cancel', array('label'   => '取消',
                                                'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/user\'')));
        } else {
            $this->addComponent('Password', array('label' => '密碼', 'required' => true))
                 ->addComponent('Submit', array('label' => '新增使用者'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('userName', 'userEnglishName', 'titleId'), 'line1', array('order' => 1));
        $this->addDisplayGroup(array('account', 'email', 'privilegeId'), 'line2', array('order' => 2));
        $this->addDisplayGroup(array('password', 'passwordConfirm', 'isLeader'), 'line3', array('order' => 3));
        $this->addDisplayGroup(array('education'), 'line4', array('order' => 4));
        $this->addDisplayGroup(array('experience'), 'line5', array('order' => 5));
        $this->addDisplayGroup(array('talk'), 'line6', array('order' => 6));
        $this->addDisplayGroup(array('submit', 'cancel'), 'lineEnd', array('order' => 99));
    }
}
?>