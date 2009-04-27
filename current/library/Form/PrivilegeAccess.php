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
 * Form_PrivilegeAccess
 *
 * 設定資源存取表單
 */
class Form_PrivilegeAccess extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Select', 'privilegeId',
                          array('label'        => '權限',
                                'required'     => true,
                                'table'        => 'Privilege',
                                'columnPair'   => array('privilegeId', 'privilegeName'),
                                'defaultValue' => array('0' => '無'),
                                'validators'   => array(array('GreaterThan', true, array('min' => 0, 'messages' => '請選擇一個權限名稱')))))
             ->addElement('Select', 'resourceId',
                          array('label'        => '存取資源：',
                                'required'     => true,
                                'table'        => 'Resource',
                                'columnPair'   => array('resourceId', 'resourceName'),
                                'defaultValue' => array('0' => '無'),
                                'validators'   => array(array('GreaterThan', true, array('min' => 0, 'messages' => '請選擇一個存取資源名稱')))))
             ->addElement('Submit', 'submit',
                          array('label' => '新增'));
        
        // 設定分行
        $this->addDisplayGroup(array('privilegeId', 'resourceId'))
             ->addDisplayGroup(array('submit'));
    }
}
?>