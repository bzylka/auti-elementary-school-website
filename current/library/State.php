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
 * State
 *
 * 系統狀態檢查類別
 */
class State
{
    // 設定常數
    const IS_WRITABLE = 'IS_WRITABLE';
    const IS_READONLY = 'IS_READONLY';
    const IS_READABLE = 'IS_READABLE';
    const IS_LOADED   = 'IS_LOADED';
    const BIGGER      = 'BIGGER';
    const EQUAL       = 'EQUAL';
    const SMALLER     = 'SMALLER';
    const SUGGESTION  = true;
    
    /**
     * @var object Instance
     * @access protected
     */
    protected static $_instance = null;
    
    /**
     * @var array 檢查物件Array
     * @access protected
     */
    protected $_validators = array();
    
    /**
     * @var array 檢查結果
     * @access protected
     */
    protected $_messages = array();
    
    /**
     * @var array 是否有錯誤
     * @access protected
     */
    protected $_isError = false;

    /**
     * 建構子，不使用
     */
    private function __construct()
    {
    }
    
    /**
     * 單體模式
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
    
    /**
     * 加入檢查物件
     * @param string $className  檢查物件類別
     * @param string $item       檢查項目
     * @param mixed  $conditions 檢查條件
     * @param string $key        儲存結果的鍵值
     * @param string $suggestion 是否為建議值
     */
    public function addValidator($className, $item, $conditions, $key, $suggestion = false)
    {
        $validatorClassName = 'State_Validator_' . $className;
        $this->_validators[] = new $validatorClassName($item, $conditions, $key, $suggestion);
        return $this;
    }
    
    /**
     * 檢查物件
     * @return array 檢查結果
     */
    public function isValid()
    {
        foreach ($this->_validators as $validator) {
            if ($validator->isValid() == false && $validator->isSuggestion() == false) {
                $this->_isError = true;
            }
            $this->_messages[] = $validator->getMessage();
        }

        return !$this->_isError;
    }
    
    /**
     * 取得檢查結果
     * @return array 檢查結果
     */
    public function getMessage()
    {
        return $this->_messages;
    }
}
?>
