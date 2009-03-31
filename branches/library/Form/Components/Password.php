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
 * Form_Components_Password
 *
 * 表單組件：密碼
 */
class Form_Components_Password extends Zend_Form_Element_Password
{ 
    /**
     * 建構子
     */
    public function __construct($name, $options)
    {
        parent::__construct($name, $options);
        
        // 加入NotEmpty的設定
        if ($options['required'] == true) {
            $this->addValidator('NotEmpty', true, array('messages' => '密碼不能空白'));
        }
        
        $this->addValidator('Alnum', true, array('messages' => array(Zend_Validate_Alnum::NOT_ALNUM    => '密碼只能使用"英文"和"數字"',
                                                                     Zend_Validate_Alnum::STRING_EMPTY => '密碼不能空白')))
             ->addValidator('StringLength', true, array(4, 'messages' => '密碼需要4個字以上'));

        
    }
}
?>