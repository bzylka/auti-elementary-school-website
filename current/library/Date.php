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
     * @var object Instance
     * @access protected
     */
    protected static $_instance = null;

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
            self::$_instance = new Zend_Date();
        }

        return self::$_instance;
    }
    
    /**
     * 日期加總/相減
     * @param  string $originDate 要加總的日期
     * @param  int    $days 加總量/相減量
     * @return string 加總後的日期
     */
    public static function add($originDate, $days)
    {
        $date = self::getInstance();
        $date->set($originDate, 'yyyy-MM-dd');
        $date->add($days, Zend_Date::DAY);
        return $date->get('yyyy-MM-dd');
    }
    
    /**
     * 日期相減
     * @param  string $date1 減數
     * @param  string $date2 被減數
     * @return string 相減後的天數
     */
    public static function sub($date1, $date2)
    {
        $date = self::getInstance();
        $date->set($date1, 'yyyy-MM-dd');
        $timestamp1 = $date->get(Zend_Date::TIMESTAMP);
        
        $date->set($date2, 'yyyy-MM-dd');
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
     * 取得一個月的所有日期
     * @param string $startDate 開始日期
     * @param string $endDate   結束日期
     * @return array 日期陣列
     */
    public static function getRangeDates($startDate, $endDate)
    {
        $calendarCache = Zend_Registry::get('cacheManager')->getCache('calendar');
        $cacheTag      = str_replace('-', '', $startDate) .'calenadr';
        
        // 檢查是否有Cache可使用
        if (!$calendar = $calendarCache->load($cacheTag)) {
            // 取得跟前一週星期天的距離、日期
            $date = self::getInstance();
            $date->set($startDate, 'yyyy-MM-dd');

            // 檢查日期限制為1970～2100
            if ($date->get('yyyy') < 1970 || $date->get('yyyy') > 2100) {
                exit('超過日期限制，本行事曆限制年份為西元1970年～西元2100年');
            }

            $preStartDays = $date->get(Zend_Date::WEEKDAY_8601) - 1;
            $preStartDate = self::add($startDate, -$preStartDays);

            // 取得跟最後一週星期天的距離
            $date->set($endDate, 'yyyy-MM-dd');
            $afterStartDays = 7 - $date->get(Zend_Date::WEEKDAY_8601);
            $afterStartDate = self::add($endDate, $afterStartDays);

            // 回傳陣列
            $row = 0;
            $calendar['preStartDays']   = $preStartDays;
            $calendar['afterStartDays'] = $afterStartDays;

            $rangeDays = self::sub($endDate, $startDate);
            $today     = self::getDate();
            for ($i = 0; $preStartDate <= $afterStartDate; $i++, $preStartDate = self::add($preStartDate, 1)) {
                if ($i > 0 && $i % 7 == 0) {
                    $row++;
                    $i = 0;
                }
                $calendar['date'][$row][$i]['date'] = $preStartDate;

                // 類別判斷
                if ($row * 7 + $i + 1 <= $preStartDays) {
                    $calendar['date'][$row][$i]['type'] = 'preDays';
                } elseif ($row * 7 + $i + 1 > $preStartDays + $rangeDays + 1) {
                    $calendar['date'][$row][$i]['type'] = 'afterDays';
                } else {
                    $calendar['date'][$row][$i]['type'] = 'normal';
                }
            }
            
            $calendarCache->save($calendar, $cacheTag);
        }

        return $calendar;
    }

    /**
     * 從Google取得節日
     * @param string $startDate 開始日期
     * @param string $endDate   結束日期
     * @return array 節日陣列
     */
    public function getFestivals($startDate, $endDate)
    {
        $festivalCache = Zend_Registry::get('cacheManager')->getCache('calendar');
        $cacheTag      = str_replace('-', '', $startDate) . 'festival';

        // 檢查是否有快取可以使用
        if (!$festival = $festivalCache->load($cacheTag)) {
            // 網路發生問題，無法連線，發出錯誤訊息
            if (!$festivalFeed = @file_get_contents("http://www.google.com/calendar/feeds/taiwan__zh_tw%40holiday.calendar.google.com/public/basic?orderby=starttime&sortorder=ascending&start-min=$startDate&start-max=$endDate")) {
                return 'error';
            }

            // 剖析Google Calendar的內容
            $festivalObj = new SimpleXMLElement($festivalFeed);
            foreach ($festivalObj->entry as $festivalEntry) {
                preg_match('/\d{4}-\d{2}-\d{2}/', $festivalEntry->summary, $match);
                $festival[] = array('date' => $match[0], 'title' => (string)$festivalEntry->title);
            }
            
            $festivalCache->save($festival, $cacheTag);
        }

        return $festival;
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
        return Zend_Date::isDate($date, 'yyyy-MM-dd');
    }
}
?>
