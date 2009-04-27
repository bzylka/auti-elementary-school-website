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
 * Calendar_EventController
 *
 * 行事曆事件管理
 */
class Calendar_EventController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 檢查權限
        $this->isAllowed('行事曆管理', true);
        parent::init();
    }
    
    /**
     * 新增行事曆事件
     */
    public function addAction()
    {
        $event = new Model_Event();

        if ($this->isPost()) {
            if ($event->isValid()) {
                $event->add();
                $this->redirect('calendar/view/by2Week/date/' . $event->getForm()->startDate->getValue(), $event->getMessage());
            } else {
                $this->view->message = $event->getMessage();
            }
        }

        $this->view->eventForm = $event->getForm();
        $this->render('index');
    }
    
     /**
     * 編輯事件類別
     */
    public function editAction()
    {
        $id = $this->getParam('id');
        $event = new Model_Event();
        $event->setFormType('edit');

        if ($this->isPost()) {
            if ($event->isValid()) {
                $event->update($id);
                $this->redirect('calendar/view/by2Week/date/' . $event->getForm()->startDate->getValue(), $event->getMessage());
            } else {
                $this->view->message = $event->getMessage();
            }
        } elseif (!$event->setFormById($id)) {
            $this->redirect('calendar', $event->getMessage());
        }

        $this->view->eventForm = $event->getForm();
        $this->render('index');
    }

    /**
     * 刪除事件類別
     */
    public function deleteAction()
    {
        $id = $this->getParam('id');
        $event = new Model_Event();
        $event->delete($id);
        $this->redirect('calendar', $event->getMessage());
    }
}
?>
