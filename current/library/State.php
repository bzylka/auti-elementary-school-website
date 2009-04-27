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
    const WRITABLE = 'WRITABLE';
    const READONLY = 'READONLY';
    const IS_EXIST = 'IS_EXIST';
    const BIGGER   = 'BIGGER';
    const EQUAL    = 'EQUAL';
    const SMALLER  = 'SMALLER';
    const LOADED   = 'LOADED';
    
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
     * @var array 錯誤訊息
     * @access protected
     */
    protected $_errorMessages = array();

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
     */
    public function addValidator($className, $item, $conditions, $key = null)
    {
        if ($key === null) {
            $key = $item;
        }
        
        $validatorClassName = 'State_Validator_' . $className;
        $this->_validators[$className][$key] = new $validatorClassName($item, $conditions);
        return $this;
    }
    
    /**
     * 檢查物件
     * @return array 檢查結果
     */
    public function isValid()
    {
        if(count($this->_states) > 0) {;
            foreach ($this->_states as &$state) {
                if ($state->isValid()) {
                    $this->_results[$state->getClassName()][$state->getKey()]['isValid'] = true;
                } else {
                    $this->_isValid   = false;
                    $this->_message[] = $state->getMessage();
                    $this->_results[$state->getClassName()][$state->getKey()]['isValid'] = false;
                }
                $this->_results[$state->getClassName()][$state->getKey()]['message'] = $state->getMessage();
            }
            
            // 排序結果
            foreach ($results as &$result) {
                ksort($result);
            }
            
            return $this->_isValid;
        } else {
            return false;
        }
    }
    
    /**
     * 取得檢查結果
     * @return array 檢查結果
     */
    public function getMessage()
    {
        return $this->_message;
    }
    
    /**
     * 取得錯誤訊息
     * @return array 錯誤訊息
     */
    public function getErrorMessage()
    {
        return $this->_erroeMessage;
    }
    
    /*
    $state->addState('Dir', 'data', STATE::DIR_WRITABLE)
          ->addState('File', 'photos', STATE::DIR_WRITABLE)
          ->addState('Extension', 'mbstring', STATE::LOADED)
          ->addState('Ini', 'TimeZone', STATE::EQUAL, 'Asia/Taipei')
    $state->getState();
    DIR
        PHOTO_DIR
            ->isValid
            ->message = 檔案應該可寫入
        ………
        
    FILE
        ISINSTALL
            ->isValid
            ->message
    EXTENSIon
        mbstring
    INI
    
    */
}
?>
