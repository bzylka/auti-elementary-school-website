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
 * Album_SetcoverController
 *
 * 設定相簿封面
 */
class Album_SetcoverController extends Controller
{
    /**
     * 新增相簿
     */
    public function indexAction()
    {
        $this->isAllowed('編輯相簿', true);
        $album = new Model_Album();
        $album->setCover($this->getParam('albumId'), $this->getParam('id'));
        $this->redirect('album/view/photo/id/' . $this->getParam('id'), '設定完成');
    }
}
?>
