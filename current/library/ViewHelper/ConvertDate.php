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
 * ViewHelper_ConvertDate
 *
 * 轉換日期格式
 */
class ViewHelper_ConvertDate
{
    /**
     * 轉換日期格式
     * @param string $date 日期字串
     * @return string 轉換過後的日期字串
     */
    public function convertDate($date)
    {
        $dateArray = explode('-', $date);
        return (int)$dateArray[1] . '月' . (int)$dateArray[2] . '日';
    }
}
?>

