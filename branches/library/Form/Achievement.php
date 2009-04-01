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
 * Form_Achievement
 *
 * 成果區塊表單
 */
class Form_Achievement extends Form_Abstract
{
    public function init()
    {
        $this->setMethod('post');
             ->setAttrib('enctype', 'multipart/form-data');
             
        $this->addElement('Text', 'achievementName',
                          array('label'     => '成果名稱',
                                'required'  => true
                                'size'      => 20,
                                'maxlength' => 50,
                                'stringMin' => 0,
                                'stringMax' => 50))
             ->addElement('Text', 'DisplayOrder',
                          array('label'     => '顯示順序',
                                'size'      => 3,
                                'maxlength' => 2,
                                'filters'   => array('Int')));

        $$this->addDisplayGroup(array('achievementName', 'displayOrder'));
        
        if ($this->_formType == 'edit') {
            $this->addElement('Submit', 'submit',
                              array('label' => '更新'));
        } else {
            $this->addElement('File', 'achievementFile'
                              array('label'       => '成果檔案',
                                    'size'        => 40,
                                    'maxFileSize' => 209715200,
                                    'fileSize'    => '200MB'))
                 >addElement('Submit', 'submit',
                             array('label' => '更新'));
                             
            $this->addDisplayGroup(array('achievementFile'));
        }
        
        $this->addElement('Cancel', 'cancel',
                          array('label'   => '取消',
                                'attribs' => array('onclick' => 'window.location.reload()')));

        $this->addDisplayGroup(array('submit', 'cancel'));
    }
}
?>