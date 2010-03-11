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
 * Form_Abstract
 *
 * 覆載Zend_Form的抽象類別
 */
abstract class Form_Abstract extends Zend_Form
{
    /**
     * @var string 表單類型
     * access protected
     */
    protected $_formType;
    
    /**
     * @var array 顯示組陣列
     * access protected
     */
    protected $_displayGroupArray;
    
    /**
     * 覆載Zend_Form的建構子
     *
     */
    public function __construct($formTpye = null)
    {
        $this->_formType = $formTpye;
        parent::__construct(array('name' => substr(get_class($this), 5)));
        $this->_handleDisplayGroup();
    }
    
    /**
     * 提供給子類別的Hook
     */
    public function init()
    {
    }

    /**
     * 覆載loadDefaultDecorators()
     */
    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            'Form'));
    }

    /**
     * 加入顯示群組
     * @param array $elements 顯示群組
     */
    public function addDisplayGroup($elements)
    {
        $this->_displayGroupArray[] = $elements;
        return $this;
    }
    
    /**
     * 覆載setAction()，加上baseUrl的功能
     * @param string $action 表單的送出路徑
     */
    public function setAction($action)
    {
        if ($action) {
            return parent::setAction(BASE_URL . $action);
        } else {
            return parent::setAction('');
        }
    }

    /**
     * 加入表單元素
     * @param string $componentName 元素類別
     * @param string $componentName 元素名稱
     * @param array  $options       元素設定
     * @return this
     */
    public function addElement($elementClass, $name = null, $options)
    {
        $elementClass = Form_Components_ . $elementClass;
        parent::addElement(new $elementClass($name, $options));
        return $this;
    }
    
    /**
     * 刪除空白的元素（用於密碼變更）
     * @param string $elementName 欄位名稱
     * @return $this
     */
    public function removeEmptyElement($elementName)
    {
        if (!$this->getElement($elementName)->getValue()) {
            $this->removeElement($elementName);
        }
        return $this;
    }
    
    /**
     * 處理顯示群組
     */
    private function _handleDisplayGroup()
    {
        if (isset($this->_displayGroupArray)) {
            $arrayCount = count($this->_displayGroupArray);
            foreach ($this->_displayGroupArray as $key => &$displayGroup) {
                if ($key == ($arrayCount - 1)) {
                    parent::addDisplayGroup($displayGroup, 'lineEnd', $key);
                } else {
                    parent::addDisplayGroup($displayGroup, 'line' . $key, $key);
                }
            }
        }

        $this->setDisplayGroupDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'dl')),
            'Fieldset'));
    }
}
?>
