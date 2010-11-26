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
 * Sitemap_IndexController
 *
 * 網站導覽
 */
class Sitemap_IndexController extends Controller
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
