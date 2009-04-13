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
 * Calendar_ViewController
 *
 * 顯示行事曆
 */
class Calendar_ViewController extends Controller
{
    /**
     * 轉向到顯示兩週行事曆
     */
    public function indexAction()
    {
        $this->_forward('by2Week');
    }
    
    /**
     * 顯示兩週行事曆
     * 參數：year/2009/week/2
     */
    public function by2weekAction()
    {
        // 算出每週的第一天
        // 再做月或者兩週的處理
        $date = Zend_Date::now();
        echo $date->get();
        exit;
        
        $this->render('index');
    }
}
?>
