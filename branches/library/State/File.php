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
 * State_File
 *
 * 系統狀態檢查類別
 */
class State_File extends State_Abstract
{
    /**
     * 取得結果
     * @return array 結果
     */
    public function isValid()
    {
        switch ($this->_conditions[0]) {
            case State::WRITABLE:
                $result = iswritable($this->_item);
                $state  = '可寫入';
                break;
            case State::READONLY:
                $result = !iswritable($this->_item);
                $state  = '可讀取';
                break;
            case State::IS_EXIST:
                $result = is_file($this->_item);
                $state  = '存在';
                break;
            default:
                trigger_error('State_File的條件不能為' . $this->_conditions[0], E_USER_ERROR);
                break;
        }
        
        if ($result == false) {
            $this->_message = '檔案"' . $this->getKey() . '"應該是' . $state;
        }
    }
}
?>
