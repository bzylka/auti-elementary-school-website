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
 * ViewHelper_RestrictString
 *
 * 限制字串
 */
class ViewHelper_RestrictString
{
    /**
     * 限制字串
     * @param string $string 字串
     * @param int    $limit  限制長度
     * @return string 縮減過後的字串
     */
    public function restrictString($string, $limit)
    {
        $stringLength = mb_strwidth($string, 'UTF-8');

        if ($stringLength <= $limit) {
            return $string;
        } else {
            return mb_strimwidth($string, 0, $limit, '…', 'UTF-8');
        }
    }
}
?>

