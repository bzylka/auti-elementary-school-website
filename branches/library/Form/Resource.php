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
 * Form_Resource
 *
 * 資源表單
 */
class Form_Resource extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'resourceName',
                          array('label'     => '資源名稱',
                                'required'  => true,
                                'size'      => 30,
                                'maxlength' => 30,
                                'stringMin' => 1,
                                'stringMax' => 30));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/resource\'')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('resourceName'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>