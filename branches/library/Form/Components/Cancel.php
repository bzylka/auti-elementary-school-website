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
 * Form_Components_Cancel
 *
 * 取消按鈕
 */
class Form_Components_Cancel extends Zend_Form_Element_Button
{ 
    /**
     * 建構子
     */
     public function __construct($name, $options)
    {
        parent::__construct($name, $options);
        
        $this->setDecorators(array('ViewHelper', array('HtmlTag', array('tag' => 'dt'))))
             ->setIgnore(true);
        
        if ($clickMethod = $this->getAttrib('onclick')) {
            $this->setAttribs(array('onclick' => $clickMethod, 'onkeypress' => $clickMethod));
        }
    }
}
?>