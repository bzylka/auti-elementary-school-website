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
 * Hash
 *
 * 產生Hash值
 */
class Hash
{
    /**
     * 如果有輸入字串則產生字串的Hash值，沒有則產生亂數Hash值
     * @param string $string 字串
     * @return string Hash字串
     */
    public static function generate($string)
    {
        if (is_string($string)) {
            return sha1($string);
        } else {
            return sha1(uniqid(mt_rand(), true));
        }
    }
}
?>
