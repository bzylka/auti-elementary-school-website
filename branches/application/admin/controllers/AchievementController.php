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
 * Admin_AchievementController
 *
 * 管理介面/成果區塊
 */
class Admin_AchievementController extends Controller
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
     * 顯示成果列表＆新增成果
     */
    public function indexAction()
    {
        $achievement = new Model_Achievement();

        if ($this->isPost()) {
            if ($achievement->isValid()) {
                // 處理壓縮檔
                $achievementFile = $achievement->getForm()->achievementFile->getTransferAdapter()->getFileInfo();
                $achievementFile = $achievementFile['achievementFile'];
                
                $zip = new ZipArchive();
                if ($zip->open($achievementFile['tmp_name']) == true) {
                    $dirHash = Hash::generate();
                    $zip->extractTo(DATA_DIR . $dirHash);
                    $zip->close();
                    $achievement->addData(array('dirHash' => $dirHash));
                    $achievement->add();
                } else {
                    $achievement->setMessage('檔案' . $achievementFile['name'] . '處理失敗，請聯絡系統管理員');
                }
                
                $this->redirect('admin/achievement', $achievement->getMessage());
            } else {
                $this->view->message = $achievement->getMessage();
            }
        }
        
        $this->view->achievementTable = $achievement->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->achievementForm  = $achievement->getForm();
        $this->render('index');
    }
    
    /**
     * 編輯成果名稱
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $achievement = new Model_Achievement();
        $achievement->setFormType('edit');
        
        if ($this->isPost()) {
            if ($achievement->isValid()) {
                $achievement->update($id);
                $this->redirect('admin/achievement', $achievement->getMessage());
            } else {
                $this->view->message = $achievement->getMessage();
            }
        } elseif (!$achievement->setFormById($id)) {
            $this->redirect('admin/achievement', $achievement->getMessage());
        }

        $this->view->achievementTable = $achievement->getTable()->order('displayOrder')->getRowset()->toArray();
        $this->view->achievementForm  = $achievement->getForm();
        $this->render('index');
    }
    
    /**
     * 刪除相簿年份
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $achievement = new Model_Achievement();
        $achievement->delete($id);
        $this->redirect('admin/achievement', $achievement->getMessage());
    }
}
?>
