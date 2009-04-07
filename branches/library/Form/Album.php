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
 * Form_Album
 *
 * 相簿表單
 */
class Form_Album extends Form_Abstract
{ 
    public function init()
    {
        $this->setMethod('post');
             
        $this->addElement('Text', 'albumName',
                          array('label'     => '相簿名稱',
                                'required'  => true,
                                'size'      => 20,
                                'maxlength' => 50,
                                'stringMin' => 0,
                                'stringMax' => 50))
             ->addElement('Select', 'albumYearId',
                          array('label'        => '相簿年份',
                                'required'     => true,
                                'table'        => 'AlbumYear',
                                'columnPair'   => array('albumYearId', 'albumYearName'),
                                'defaultValue' => array('0' => '無')))
             ->addElement('Text', 'createDate',
                          array('label'      => '建立日期',
                                'required'   => true,
                                'class'      => 'callDatepicker',
                                'size'       => 10,
                                'maxlength'  => 10,
                                'stringMin'  => 10,
                                'stringMax'  => 10,
                                'validators' => array(array('Date', true, array('messages' => '相簿日期格式錯誤')))));

        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'history.go(-1)')));
        } else {
            $this->addElement('Submit', 'submit',
                              array('label' => '新增'))
                 ->addElement('Cancel', 'cancel',
                              array('label'   => '取消',
                                    'attribs' => array('onclick' => 'location.href=\'' . BASE_URL . 'album\'')));
        }
        
        //設定分行
        $this->addDisplayGroup(array('albumName', 'albumYearId', 'createDate'))
             ->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>