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
 * Admin_ResourceController
 *
 * 管理介面/資源管理
 */
class Admin_ResourceController extends Controller
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
     * 顯示資源列表＆新增資源
     */
    public function indexAction()
    {
        $resource = new Model_Resource();

        if ($this->isPost()) {
            if ($resource->isValid()) {
                $resource->add();
                $this->redirect('admin/resource', $resource->getMessage());
            } else {
                $this->view->message = $resource->getMessage();
            }
        }

        $this->view->resourceTable = $resource->getTable()->getRowset()->toArray();
        $this->view->resourceForm  = $resource->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯資源
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $resource = new Model_Resource();
        $resource->setFormType('edit');
       
        if ($this->isPost()) {
            if ($resource->isValid()) {
                $resource->update($id);
                $this->redirect('admin/resource', $resource->getMessage());
            } else {
                $this->view->message = $resource->getMessage();
            }
        } elseif (!$resource->setFormById($id)) {
            $this->redirect('admin/resource', $resource->getMessage());
        }

        $this->view->resourceTable = $resource->getTable()->getRowset()->toArray();
        $this->view->resourceForm  = $resource->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除資源
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $resource = new Model_Resource();
        $resource->delete($id);
        $this->redirect('admin/resource', $resource->getMessage());
    }
}
?>
