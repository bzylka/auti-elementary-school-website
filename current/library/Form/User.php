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
    public function init()
    {
        $this->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addElement('Text', 'userName',
                          array('label'     => '使用者姓名',
                                'required'  => true,
                                'size'      => 15,
                                'maxlength' => 20,
                                'stringMin' => 2,
                                'stringMax' => 20))
             ->addElement('Text', 'userEnglishName',
                          array('label'      => '英文姓名',
                                'size'       => 20,
                                'maxlength'  => 20,
                                'stringMin'  => 2,
                                'stringMax'  => 20,
                                'validators' => array(array('Alpha', true, array('messages' => '使用者英文姓名必須輸入英文',
                                                                                 'allowWhiteSpace' => true)))))
             ->addElement('Text', 'account',
                          array('label'      => '帳號',
                                'required'   => true,
                                'size'       => 15,
                                'maxlength'  => 20,
                                'stringMin'  => 4,
                                'stringMax'  => 10,
                                'filters'    => array('StringToLower'),
                                'validators' => array(array('Alnum', true, array('messages' => '帳號只能使用"英文"和"數字"')))))
             ->addElement('Password', 'passwordConfirm',
                          array('label'     => '確認密碼',
                                'size'      => 15,
                                'maxlength' => 8,
                                'stringMin' => 4,
                                'stringMax' => 8))
             ->addElement('Text', 'email',
                          array('label'      => 'E-mail',
                                'size'       => 20,
                                'maxlength'  => 30,
                                'stringMin'  => 0,
                                'stringMax'  => 30,
                                'validators' => array(array('EmailAddress', true, array('messages' => 'E-mail位址格式錯誤')))));
        if ($this->_formType != 'userEdit') {
            $this->addElement('Select', 'titleId',
                              array('label'        => '職稱',
                                    'table'        => 'Title',
                                    'columnPair'   => array('titleId', 'titleName'),
                                    'defaultValue' => array('0' => '無')))
                 ->addElement('Select', 'privilegeId',
                              array('label'        => '權限',
                                    'table'        => 'Privilege',
                                    'columnPair'   => array('privilegeId', 'privilegeName'),
                                    'defaultValue' => array('0' => '無')))
                 ->addElement('Checkbox', 'isLeader',
                              array('label' => '主任/校長'));
        }

        $this->addElement('File', 'photo',
                          array('label'       => '上傳相片',
                                'ignore'      => true,
                                'size'        => 40,
                                'maxFileSize' => 10485760,
                                'fileSize'    => '10MB',
                                'validators'  => array(
                                                   array('Extension', false, 'jpg'))))
             ->addElement('Textarea', 'education',
                          array('label'     => '學歷',
                                'cols'      => 25,
                                'rows'      => 4,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Textarea', 'experience',
                          array('label' => '經歷',
                                'cols'      => 25,
                                'rows'      => 4,
                                'stringMin' => 0,
                                'stringMax' => 255))
             ->addElement('Textarea', 'talk',
                          array('label' => '想說的話',
                                'cols'      => 50,
                                'rows'      => 6,
                                'stringMin' => 0,
                                'stringMax' => 255));

        if ($this->_formType == 'edit' || $this->_formType == 'userEdit') {
            $this->addElement('Password', 'password',
                              array('label'      => '變更密碼',
                                    'allowEmpty' => true,
                                    'size'       => 15,
                                    'maxlength'  => 8,
                                    'stringMin'  => 4,
                                    'stringMax'  => 8))
                 ->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                               array('label'   => '取消',
                                     'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/user\'')));
        } else {
            $this->addElement('Password', 'password',
                              array('label' => '密碼',
                                    'required' => true,
                                    'size'       => 15,
                                    'maxlength'  => 8,
                                    'stringMin'  => 4,
                                    'stringMax'  => 8))
                 ->addElement('Submit', 'submit',
                              array('label' => '新增使用者'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('userName', 'userEnglishName', 'titleId'))
             ->addDisplayGroup(array('account', 'email', 'privilegeId'))
             ->addDisplayGroup(array('password', 'passwordConfirm', 'isLeader'))
             ->addDisplayGroup(array('photo'))
             ->addDisplayGroup(array('education'))
             ->addDisplayGroup(array('experience'))
             ->addDisplayGroup(array('talk'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>