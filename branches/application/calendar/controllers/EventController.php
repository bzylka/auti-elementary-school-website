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
}
?>
