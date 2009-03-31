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
    /**
     * 建構子
     * @param string $type 表單類型
     */
    public function __construct($type = null)
    { 
        parent::__construct();
        
        $this->setName('resourceForm')
             ->setMethod('post');
             
        $this->addComponent('ResourceName', array('label' => '資源名稱', 'required' => true));

        if ($type == 'edit') {
            $this->addComponent('Submit', array('label' => '更新'))
                 ->addComponent('Cancel', array('label'   => '取消',
                                                'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/resource\'')));
        } else {
            $this->addComponent('Submit', array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('resourceName'), 'line1', array('order' => 1));
        $this->addDisplayGroup(array('submit', 'cancel'), 'lineEnd', array('order' => 99));
    }
}
?>