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
 * State_Validator_Ini
 *
 * 檢查php.ini的設定
 */
class State_Validator_Ini extends State_Validator_Abstract
{
    /**
     * 取得結果
     * @return bool 檢查結果
     */
    public function isValid()
    {
        $currentSetting = ini_get($this->_item);

        switch ($this->_conditions[0]) {
            case 'EQUAL':
                if ($currentSetting == $this->_conditions[1]) {
                    $isValid = true;
                } else {
                    $isValid = false;
                }

                if ($currentSetting == '1' ) {
                    $currentSetting = '啟動';
                } elseif ($currentSetting == '') {
                    $currentSetting = '關閉';
                }
                
                break;
            case 'BIGGER':
                if ($currentSetting > $this->_conditions[1]) {
                    $isValid = true;
                } else {
                    $isValid = false;
                }

                break;
            case 'SMALLER':
                if ($currentSetting < $this->_conditions[1]) {
                    $isValid = true;
                } else {
                    $isValid = false;
                }

                break;
            default:
                trigger_error('State_Validator_Ini的條件不能為' . $this->_conditions, E_USER_ERROR);
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
