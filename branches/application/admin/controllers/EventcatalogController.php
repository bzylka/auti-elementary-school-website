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
 * Admin_EventcatalogController
 *
 * 管理介面/事件類別管理
 */
class Admin_EventcatalogController extends Controller
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
     * 顯示事件類別列表＆新增事件類別
     */
    public function indexAction()
    {
        $eventCatalog = new Model_EventCatalog();

        if ($this->isPost()) {
            if ($eventCatalog->isValid()) {
                $eventCatalog->add();
                $this->redirect('admin/eventCatalog', $eventCatalog->getMessage());
            } else {
                $this->view->message = $eventCatalog->getMessage();
            }
        }
        
        $this->view->eventCatalogList = $eventCatalog->getTable()->order('eventCatalogName')->getRowset()->toArray();
        $this->view->eventCatalogForm = $eventCatalog->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯事件類別
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $eventCatalog = new Model_EventCatalog();
        $eventCatalog->setFormType('edit');
        
        if ($this->isPost()) {
            if ($eventCatalog->isValid()) {
                $eventCatalog->update($id);
                $this->redirect('admin/eventCatalog', $eventCatalog->getMessage());
            } else {
                $this->view->message = $eventCatalog->getMessage();
            }
        } elseif (!$eventCatalog->setFormById($id)) {
            $this->redirect('admin/eventCatalog', $eventCatalog->getMessage());
        }

        $this->view->eventCatalogList = $eventCatalog->getTable()->order('eventCatalogName')->getRowset()->toArray();
        $this->view->eventCatalogForm = $eventCatalog->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除事件類別
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $eventCatalog = new Model_EventCatalog();
        $eventCatalog->delete($id);
        $this->redirect('admin/eventCatalog', $eventCatalog->getMessage());
    }
}
?>
