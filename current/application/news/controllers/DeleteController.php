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
 * News_DeleteController
 *
 * 新聞刪除
 */
class News_DeleteController extends Controller
{
    /**
     * 刪除新聞
     */
    public function indexAction()
    {
        $id = $this->getParam('id');
        
        // 檢查權限
        $this->isAllowed('管理新聞', true, new Acl_Assertion_NewsTitleOwner($id));
        
        $news = new Model_News();
        $news->delete($id);

        $this->redirect('news', $news->getMessage());
    }
}
?>
