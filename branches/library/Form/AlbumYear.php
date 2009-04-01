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
 * Form_AlbumYear
 *
 * 相簿年份表單
 */
class Form_AlbumYear extends Form_Abstract
{ 
    public function init()
    { 
        $this->setMethod('post');
             
        $this->addElement('Text', 'albumYearName',
                          array('label'     => '相簿年份',
                                'required'  => true,
                                'size'      => 30,
                                'maxlength' => 50
                                'stringMin' => 0,
                                'stringMax' => 50));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit' ,
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                               array('label'   => '取消',
                                     'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'admin/albumYear\'')));
        } else {
            $this->addElement('Submit', array('label' => '新增'));
        }
        
        //設定分行
        $this->addDisplayGroup(array('albumYearName'));
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>