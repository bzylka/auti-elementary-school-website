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
 * State_Validator_Abstract
 *
 * 系統狀態檢查抽象類別
 */
abstract class State_Validator_Abstract implements State_Validator_Interface
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
     * @var mixed 儲存結果訊息
     * @access protected
     */
    protected $_message;
    
    /**
     * 建構子
     * @param string $item       檢查項目
     * @param mixed  $conditions 檢查條件
     */
    public function __construct($item, $conditions)
    {
        $this->_item       = $item;
        $this->_conditions = array()$conditions;
    }
    
    /**
     * 傳回檢查結果訊息
     * @return array 傳回檢查結果訊息
     */
    public function getMessage()
    {
        return $this->_message;
    }
}
?>
