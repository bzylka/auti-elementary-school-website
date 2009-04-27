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
 * Album_IndexController
 *
 * 顯示相簿列表
 */
class Album_IndexController extends Controller
{
    /**
     * 顯示相簿列表
     */
    public function indexAction()
    {
        // 檢查權限
        $this->view->allowAlbum = $this->isAllowed('新增相簿');
        
        $album = new Model_Album();
        $this->view->albums = $album->getAlbums();
        $this->render('index');
    }
}
?>
