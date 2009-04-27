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
 * Model_WebLink
 *
 * 網路連結
 */
class Model_WebLink extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'WebLink';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'WebLink';
    
    /**
     * @param int $limit 數量
     * @return array 網路連結列表
     */
    public function getWebLinks($limit = null)
    {
        if ($limit) {
            $this->getTable()->limit($limit);
        }
        
        if ($webLinkRowset = $this->getTable()->getRowset()) {
            return $webLinkRowset->toArray();
        } else {
            return false;
        }
    }
    
    /**
     * 覆載delete()，刪除連結圖示檔案
     * @param int $id 網路連結ID
     */
    public function delete($id)
    {
        $webLinkRow = $this->getTable()->find($id)->current();
        @unlink(PHOTO_DIR . $webLinkRow->iconHashFile);
        parent::delete($id);
    }
}
?>
