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
 * Model_News
 *
 * 最新消息處理
 */
class Model_News extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'News';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'News';

    /**
     * 取得最新消息列表
     * @param int $limit 限制數量
     * @return array 最新消息列表
     */
    private function _getNewsArray($limit = null)
    {
        // 設定限制數量
        if ($limit) {
            $this->getTable()->limit($limit);
        }

        $newsRowset = $this->getTable()->order('newsId DESC')->getRowset();
        $newsArray = array();
        foreach ($newsRowset as $newsRow) {
            $newsArray[] = array_merge($newsRow->toArray(),
                                       array('titleName'  => $newsRow->findParentRow('Table_Title')->titleName,
                                             'officeName' => $newsRow->findParentRow('Table_Office')->officeName));
        }

        return $newsArray;
    }
    
    /**
     * 取得最新消息列表
     * @param int $limit 最新消息的限制數量（用在Zend_Paginator物件上）
     * @param int $page  頁面
     * @return array 新聞列表
     */
    public function getNewsList($limit = null, $page = 0)
    {
        $newsArray = $this->_getNewsArray();
        $paginator = Zend_Paginator::factory($newsArray);
        $paginator->setCurrentPageNumber($page)
                  ->setItemCountPerPage($limit);
        return $paginator;
    }
    
     /**
     * 取得近期重要公告列表
     * @param int $days 取得重要公告的期限天數
     * @return array 新聞列表
     */
    public function getImportantNewsList($days = 365)
    {
        // 設定重要公告的條件
        $deadline = Date::add(Date::getDate(), -$days);
        $this->getTable()->where("isImportant = 1 AND postDate > '$deadline'");

        // 取得重要公告列表
        $newsArray = $this->_getNewsArray();
        $importantNewsList = array();
        foreach ($newsArray as &$news) {
            $importantNewsList[$news['officeName']][$news['titleName']][] = $news;
        }

        return $importantNewsList;
    }
    
    /**
     * 取得最新消息內容
     * @param int $id 新聞ID
     * @return array 新聞內容
     */
    public function getNews($id)
    {
        if ($newsRow = $this->getTable()->find($id)->current()) {
            $data['officeName'] = $newsRow->findParentRow('Table_Office')->officeName;
            $data['titleName']  = $newsRow->findParentRow('Table_Title')->titleName;
            $data['userName']   = $newsRow->findParentRow('Table_User')->userName;

            // 取得附件和附件檔案大小
            $data['attachment'] = $newsRow->findDependentRowset('Table_NewsAttachment')->toArray();
            foreach ($data['attachment'] as &$attachment) {
                @$attachment['fileSize'] = filesize(DATA_DIR . $attachment['fileHash']);    // 隱藏警告訊息，避免上傳錯誤暴露伺服器儲存位置
            }
            
            $data['link'] = $newsRow->findDependentRowset('Table_NewsLink')->toArray();
            return array_merge($newsRow->toArray(), $data);
        } else {
            return false;
        }
    }
    
    /**
     * 刪除新聞和附件
     * @param int $id 新聞ID
     */
    public function delete($id)
    {
        $attachmentRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_NewsAttachment');

        // 刪除檔案、資料庫內容
        foreach ($attachmentRowset as $attachmentRow) {
            @unlink(DATA_DIR . $attachmentRow->fileHash);
        }

        parent::delete($id);
    }
}
?>
