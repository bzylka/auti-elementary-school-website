<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Validator_Filename
 *
 * 檢查檔名是否正確
 */
class Validator_Filename extends Zend_Validate_Abstract
{
    const INVALID = 'filenameInvalid';

    /**
     * 錯誤訊息
     */
    protected $_messageTemplates = array(
        self::INVALID => '檔名中不可以包含下列字元：\/:*?"<>| '
    );

    /**
     * 驗證檔名
     *
     * @param  string $value
     * @return boolean
     */
    public function isValid($value)
    {
        $badChar = array('\\', '/', ':', '*', '?', '"', '<', '>', '|');

        foreach ($badChar as $bad) {
            if (strpos($value, $bad) !== false) {
                $this->_error(self::INVALID);
                return false;
            }
        }
        
        return true;
    }

}
