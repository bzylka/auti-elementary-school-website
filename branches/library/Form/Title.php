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
    /**
     * 建構子
     * @param string $type 表單類型
     */
    public function __construct($type = null)
    { 
        parent::__construct();
        
        $this->setName('titleForm')
             ->setMethod('post');
             
        $this->addComponent('TitleName', array('label' => '職稱', 'required' => true))
             ->addComponent('TitleEnglishName', array('label' => '英文名稱', 'required' => true))
             ->addComponent('DisplayOrder', array('label' => '顯示順序'))
             ->addComponent('OfficeId', array('label' => '所屬處室', 'required' => true))
             ->addComponent('Duty', array('label' => '職掌'));

        if ($type == 'edit') {
            $this->addComponent('Submit', array('label' => '更新'))
                 ->addComponent('Cancel', array('label'   => '取消',
                                                'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/title\'')));
        } else {
            $this->addComponent('Submit', array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('titleName', 'titleEnglishName'), 'line1', array('order' => 1));
        $this->addDisplayGroup(array('officeId', 'displayOrder'), 'line2', array('order' => 2));
        $this->addDisplayGroup(array('duty'), 'line3', array('order' => 3));
        $this->addDisplayGroup(array('submit', 'cancel'), 'lineEnd', array('order' => 99));
    }
}
?>