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
 * Team_IndexController
 *
 * 顯示學校團隊
 */
class Team_IndexController extends Controller
{
    /**
     * 顯示學校團隊
     */
    public function indexAction()
    {
        $user = new Model_User();
        $this->view->teamList = $user->getTeamList();
        $this->render('index');
    }
}
?>
