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
 * Title_DutyController
 *
 * 修改職掌
 */
class Title_DutyController extends Controller
{
    /**
     * 修改職掌
     */
    public function editAction()
    {
        $id = $this->getParam('id');

        // 檢查權限
        //$this->isAllowed('無', true, new Acl_Assertion_HasTitleId($id));

        $title = new Model_Title();
        $title->setFormType('userEdit');

        if ($this->isPost()) {
            if ($title->isValid()) {
                $title->update($id);
                $this->redirect('', $title->getMessage());
            } else {
                $this->view->message = $title->getMessage();
            }
        } elseif (!$title->setFormById($id)) {
            $this->redirect('', $title->getMessage());
        }

        $this->view->titleData = $title->getTable()->find($id)->current()->toArray();
        $this->view->titleForm = $title->getForm();
        $this->render('index');
    }
}
?>
