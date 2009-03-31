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
 * News_AddController
 *
 * 發佈消息
 */
class News_AddController extends Controller
{
    /**
     * 發佈最新消息
     */
    public function indexAction()
    {
        // 檢查權限
        $this->isAllowed('發佈新聞', true);
        
        $news = new Model_News();

        if ($this->isPost()) {
            if ($news->isValid()) {
                // 寫入內容
                $userInfo = Zend_Auth::getInstance()->getIdentity();
                $data['titleId']  = $userInfo->titleId;
                $data['userId']   = $userInfo->userId;
                $data['officeId'] = $userInfo->officeId;
                $data['postDate'] = Date::getDate();
                $data['postTime'] = Date::getTime();
                $news->addData($data);
                $news->add();
                $newsId = $news->getTable()->getLastInsertId();

                // 處理連結
                $newsLink = new Model_NewsLink();
                for ($i = 1; $i < 3; $i++) {
                    if ($link = $news->getForm()->{'newsLink_' . $i}->getValue()) {
                        $newsLink->addData(array('link' => $link));
                        if ($linkName = $news->getForm()->{'newsLink_' . $i . '_name'}->getValue()) {
                            $newsLink->addData(array('linkName' => $linkName));
                        } else {
                            $newsLink->addData(array('linkName' => "連結$i"));
                        }
                        $newsLink->addData(array('newsId' => $newsId));
                        $newsLink->add();
                    }
                }

                // 處理上傳檔
                $attachment = new Model_Attachment();
                $attachment->save($news, $newsId);
                if ($attachment->getMessage()) {
                    $message = $news->getMessage() . '，' . $attachment->getMessage();
                } else {
                    $message = $news->getMessage();
                }
                
                // 回到首頁
                $this->redirect('', $message);
            } else {
                $this->view->message = $news->getMessage();
            }
        }
        
        $this->view->newsForm  = $news->getForm();
        $this->render('index');
    }
}
?>
