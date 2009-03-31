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
 * State_Abstract
 *
 * 系統狀態檢查抽象類別
 */
abstract class State_Abstract implements State_Interface
{
    /**
     * @var string 檢查項目
     * @access protected
     */
    protected $_item;
    
    /**
     * @var array 檢查條件
     * @access protected
     */
    protected $_conditions = array();
    
    /**
     * @var mixed 儲存結果的鍵值
     * @access protected
     */
    protected $_key;
    
    /**
     * @var string 訊息
     * @access protected
     */
    protected $_message;
    
    /**
     * 建構子
     * @param string $item       檢查項目
     * @param mixed  $conditions 檢查條件
     * @param string $key        儲存結果的鍵值
     */
     */
    public function __construct($item, $conditions, $key)
    {
        $this->_item       = $item;
        $this->_conditions = array()$conditions;
        if ($key === null) {
            $this->_key = $item;
        } else {
            $this->_key = $key;
        }
    }
    
    /**
     * 取得檢查類別
     * @return string 檢查類別
     */
    public function getClassName()
    {
        return substr(getclass($this), 6);
    }
    
    /**
     * 取得檢查鍵值
     * @return string 檢查鍵值
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * 取得訊息
     * @return string 檢查訊息
     */
    public function getMessage()
    {
        return $this->_message;
    }
}
?>
