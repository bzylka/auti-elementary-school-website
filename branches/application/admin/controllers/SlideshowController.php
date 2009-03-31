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
 * Admin_SlideshowController
 *
 * 管理介面/相簿隨機展示
 */
class Admin_SlideshowController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 初始Controller
        parent::init();

        // 設定Layout
        $this->_helper->layout->setLayout('admin');
        
        // 檢查權限
        $this->isAllowed('管理介面', true);
    }
    
    /**
     * 顯示相簿隨機展示列表
     */
    public function indexAction()
    {
        $this->view->slideShowForm = new Form_AlbumSlide();
        $this->render('index');
    }
    
    /**
     * AJAX設定是否顯示在首頁
     */
    public function setAction()
    {
        $this->_helper->layout->disableLayout();
        if ($this->_request->isXmlHttpRequest()) {
            $album = new Table_Album();
            $albumRow = $album->find(substr($this->getParam('id'), 6))->current();
            $isSlideShow = (int)$this->getParam('isShow');
            $albumRow->isSlideShow = $isSlideShow;
            $albumRow->save();
            if ($isSlideShow == 1) {
                $type = '設定';
            } else {
                $type = '取消';
            }
            echo $type . '顯示相簿【' . $albumRow->albumName . '】完成';
        } else {
            echo '錯誤的呼叫';
        }
    }
}
?>
