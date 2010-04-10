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
 * State_Validator_Dir
 *
 * 檢查資料夾/檔案狀態
 */
class State_Validator_Filesystem extends State_Validator_Abstract
{
    /**
     * 取得結果
     * @return bool 檢查結果
     */
    public function isValid()
    {
        clearstatcache();
        
        switch ($this->_conditions) {
            case 'IS_WRITABLE':
                $isValid = is_writable($this->_item);
                
                if ($isValid == true) {
                    $currentSetting = '可寫入';
                } else {
                    $currentSetting = '無法寫入';
                }
                
                break;
            case 'IS_READABLE':
                $isValid = is_readable($this->_item);
                
                if ($isValid == true) {
                    $currentSetting = '可讀取';
                } else {
                    $currentSetting = '無法讀取';
                }
                
                break;
            case 'IS_READONLY':
                $isValid = !is_writable($this->_item);

                if ($isValid == true) {
                    $currentSetting = '唯讀';
                } else {
                    $currentSetting = '可寫入';
                }
                
                break;
            default:
                trigger_error('State_Validator_Filesystem的條件不能為' . $this->_conditions, E_USER_ERROR);
                break;
        }
        
        $this->_message = array('key'            => $this->_key,
                                'currentSetting' => $currentSetting,
                                'isValid'        => $isValid,
                                'suggestion'     => $this->_suggestion);
        return $isValid;
    }
}
?>
