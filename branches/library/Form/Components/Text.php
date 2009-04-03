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
 * Form_Components_Text
 *
 * 表單組件：文字輸入
 */
class Form_Components_Text extends Zend_Form_Element_Text
{ 
    /**
     * 建構子
     */
    public function __construct($name, $options)
    {
        parent::__construct($name, $options);

        // 加入NotEmpty的設定（暫時取消）
        /*if ($options['required'] == true) {
            $this->addValidator('NotEmpty', true, array('messages' => $this->getLabel() . '不能空白'));
        }*/
        // 處理Validators
        $validators = $this->getValidators();
        
        if (array_key_exists('NotEmpty', $validators)) {
            $validators['NotEmpty']->setMessage($this->getLabel() . '不能空白');
        }
        
        $this->addFilter('StringTrim')
             ->addValidator('StringLength', true,
                            array($option['stringMin'],
                                  $option['stringMax'],
                                  'messages' => array(Zend_Validate_StringLength::TOO_SHORT => $this->getLabel() . '需要' . $option['stringMin'] . '個字以上',
                                                      Zend_Validate_StringLength::TOO_LONG  => $this->getLabel() . '不能超過' . $option['stringMin'] . '10個字')));
    }
}
?>