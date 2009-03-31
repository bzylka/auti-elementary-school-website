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
 * Form_WebLink
 *
 * 網路連結表單
 */
class Form_WebLink extends Form_Abstract
{ 
    /**
     * 建構子
     * @param string $type 表單類型
     */
    public function __construct($type = null)
    { 
        parent::__construct();
        
        $this->setName('webLinkForm')
             ->setMethod('post')
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addComponent('IconFile', array('label' => '圖示檔案', 'required' => true))
             ->addComponent('LinkName', array('label' => '連結名稱', 'required' => true))
             ->addComponent('Link', array('label' => '連結', 'required' => true));

        if ($type == 'edit') {
            $this->iconFile->setRequired(false)
                           ->setLabel('替換圖示');
            $this->addComponent('Submit', array('label' => '更新'))
                 ->addComponent('Cancel', array('label'   => '取消',
                                                'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'webLink/\'')));
        } else {
            $this->addComponent('Submit', array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('iconFile'), 'line1', array('order' => 1));
        $this->addDisplayGroup(array('linkName'), 'line2', array('order' => 2));
        $this->addDisplayGroup(array('link'), 'line3', array('order' => 3));
        $this->addDisplayGroup(array('submit', 'cancel'), 'lineEnd', array('order' => 99));
    }
}
?>