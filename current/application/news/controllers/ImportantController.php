<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2011 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * News_ImportantController
 *
 * 顯示近期重要公告
 */
class News_ImportantController extends Controller
{
    /**
     * 顯示近期重要公告列表
     */
    public function indexAction()
    {
        $news = new Model_News();
        $this->view->newsTable = $news->getImportantNewsList(365);  // 設定發佈的天數
        $this->render('index');
    }
}
?>
