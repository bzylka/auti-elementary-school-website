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
 * Form_Components_Checkbox
 *
 * 表單組件：Checkbox
 */
class Form_Components_Checkbox extends Zend_Form_Element_Checkbox
{ 
    /**
     * 建構子
     */
    public function __construct($name, $options)
    {
        parent::__construct($name, $options);
        
        $this->addValidator('Int', true, array('messages' => $this->getLabel() . '必須是數字'));
    }
}
?>