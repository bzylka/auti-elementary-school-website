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
 * ViewHelper_FormatSize
 *
 * 格式化檔案大小
 */
class ViewHelper_FormatSize
{
    /**
     * 格式化檔案大小
     * @param string $int       檔案大小
     * @param int    $precision 精準度（小數點幾位）
     * @return string 格式化後的字串
     */
    public function formatSize($size, $precision = 0)
    {
        if ($size < 1024) {
            $formatSize = $size . '&nbsp;Bytes';
        } elseif ($size >= 1024 && $size < 1048576) {
            $formatSize = round($size / 1024, $precision) . '&nbsp;KB';
        } elseif ($size >= 1048576 && $size < 1073741824) {
            $formatSize = round($size / 1048576, $precision) . '&nbsp;MB';
        } elseif ($size >= 1073741824 && $size < 1099511627776) {
            $formatSize = round($size / 1073741824, $precision) . '&nbsp;GB';
        }
        
        return $formatSize;
    }
}
?>

