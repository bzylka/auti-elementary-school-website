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
 * Model_User
 *
 * 使用者管理
 */
class Model_User extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'User';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'User';
    
    /**
     * 取得使用者列表
     */
    public function getUserTable()
    {
        $userRowset = $this->getTable()->getRowset();
        foreach ($userRowset as $userRow) {
            $userTable[] = array_merge($userRow->toArray(),
                                       array('titleName'     => $userRow->findParentRow('Table_Title')->titleName),
                                       array('privilegeName' => $userRow->findParentRow('Table_Privilege')->privilegeName));
        }
        return $userTable;
    }
    
    /**
     * 覆載add()
     */
    public function add()
    {
        $message = parent::add();
        $this->_replacePhoto($this->getTable()->getLastInsertId());
        return $message;
    }
    
    /**
     * 覆載update()
     * @param int $id 使用者ID
     */
    public function update($id)
    {
        $message = parent::update($id);
        $this->_replacePhoto($id);
        return $message;
    }
    
    /**
     * 覆載delete()
     * @param int $id 使用者ID
     */
    public function delete($id)
    {
        @unlink(PHOTO_DIR . 'user' . $userId . '.jpg');
        parent::delete($id);
    }
    
    /**
     * 取代使用者相片
     * @param int $userId 使用者ID
     */
    private function _replacePhoto($userId)
    {
        if ($this->getForm()->photo->isUploaded()) {
            if ($imageHash = Image::resize($_FILES['photo']['tmp_name'], array(320, 240))) {
                rename(PHOTO_DIR . $imageHash, PHOTO_DIR . 'user' . $userId . '.jpg');
            } else {
                return false;
            }
        }
    }
}
?>
