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
 * State_Validator_Extension
 *
 * 檢查Extension有沒有載入
 */
class State_Validator_Extension extends State_Validator_Abstract
{
    /**
     * 取得結果
     * @return bool 檢查結果
     */
    public function isValid()
    {
        $isValid = extension_loaded($this->_item);

        if ($isValid == true) {
            $currentSetting = '已經載入';
        } else {
            $currentSetting = '尚未載入';
        }
        
        $this->_message = array('key'            => $this->_key,
                                'currentSetting' => $currentSetting,
                                'isValid'        => $isValid,
                                'suggestion'     => $this->_suggestion);
        return $isValid;
    }
}
?>
