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
 * Instruction_IndexController
 *
 * 學校簡介
 */
class Instruction_IndexController extends Controller
{
    /**
     * 顯示頁面
     */
    public function indexAction()
    {
        $this->render('index');
    }
}
?>
