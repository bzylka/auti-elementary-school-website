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
 * Date
 *
 * 日期處理類別
 */
class Date
{
    /**
     * 日期加總
     * @param  string $date 要加總的日期
     * @param  int    $days 加總量
     * @return string 加總後的日期
     */
    public static function add($date, $days)
    {
        $date = new Zend_Date();
        $date->set($date, 'YYYY-MM-dd');
        $date->add($days, Zend_Date::DAY);
        return $date->get('YYYY-MM-dd');
    }
    
    /**
     * 日期相減
     * @param  string $date1 減數
     * @param  string $date2 被減數
     * @return string 相減後的天數
     */
    public static function sub($date1, $date2)
    {
        $date = new Zend_Date();
        $date->set($date1, 'YYYY-MM-dd');
        $timestamp1 = $date->get(Zend_Date::TIMESTAMP);
        
        $date->set($date2, 'YYYY-MM-dd');
        $timestamp2 = $date->get(Zend_Date::TIMESTAMP);
        
        return ($timestamp1 - $timestamp2) / 60 / 60 / 24;
    }
    
    /**
     * 回傳今天日期
     * @return string 今天日期
     */
    public static function getDate()
    {
        return date('Y-m-d');
    }
    
    /**
     * 回傳現在時間
     * @return string 日期、時間
     */
    public static function getTime()
    {
        return date('H:i:s');
    }
    
    /**
     * 檢查日期是否正確
     * @param string $date 日期
     * @return bool 檢查結果
     */
    public function isDate($date)
    {
        return Zend_Date::isDate($date, 'YYYY-MM-dd');
    }
}
?>
