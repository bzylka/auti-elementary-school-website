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
 * Admin_AlbumnyearController
 *
 * 管理介面/相簿年份管理
 */
class Admin_AlbumyearController extends Controller
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
     * 顯示相簿年份列表＆新增相簿年份
     */
    public function indexAction()
    {
        $albumYear = new Model_AlbumYear();

        if ($this->isPost()) {
            if ($albumYear->isValid()) {
                $albumYear->add();
                $this->redirect('admin/albumYear', $albumYear->getMessage());
            } else {
                $this->view->message = $albumYear->getMessage();
            }
        }
        
        $this->view->albumYearTable = $albumYear->getAlbumYears()->toArray();
        $this->view->albumYearForm  = $albumYear->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯處室
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $albumYear = new Model_AlbumYear();
        $albumYear->setFormType('edit');
        
        if ($this->isPost()) {
            if ($albumYear->isValid()) {
                $albumYear->update($id);
                $this->redirect('admin/albumYear', $albumYear->getMessage());
            } else {
                $this->view->message = $albumYear->getMessage();
            }
        } elseif (!$albumYear->setFormById($id)) {
            $this->redirect('admin/albumYear', $albumYear->getMessage());
        }

        $this->view->albumYearTable = $albumYear->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->albumYearForm  = $albumYear->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除相簿年份
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $albumYear = new Model_AlbumYear();
        $albumYear->delete($id);
        $this->redirect('admin/albumYear', $albumYear->getMessage());
    }
}
?>
