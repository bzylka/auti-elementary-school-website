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
 * Model_Photo
 *
 * 相片處理
 */
class Model_Photo extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Photo';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'UploadPhoto';
    
    /**
     * 取得相片資訊
     * @param int $id 相片ID
     * @return array 相片資訊
     */
    public function getPhoto($id)
    {
        $photoRow = $this->getTable()->find($id)->current();
        $photo = $photoRow->toArray();
        
        // 取得相片所屬相簿名稱
        $albumRow = $photoRow->findParentRow('Table_Album');
        $photo['albumName']     = $albumRow->albumName;
        $photo['albumId']       = $albumRow->albumId;
        $photo['albumYearName'] = $albumRow->findParentRow('Table_AlbumYear')->albumYearName;
        $photo['userName']      = $photoRow->findParentRow('Table_User')->userName;
        $photo['coverPhotoFile'] = str_replace('.', '_thumb.', $albumRow->findParentRow('Table_Photo')->photoHashFile);
        // 是否有上一張、下一張
        $photoRowset = $albumRow->findDependentRowset('Table_Photo');
        
        while($photoRow = $photoRowset->current()) {
            $prevId    = $currentId;
            $currentId = $photoRow->photoId;
            $count++;
            if ($photoRow->photoId == $id) {
                $photo['prevId'] = $prevId;
                $photoRowset->next();
                if ($photoRowset->valid()) {
                    $photo['nextId'] = $photoRowset->current()->photoId;
                }
                break;
            }
            $photoRowset->next();
        }
        
        $photo['count']      = $count;
        $photo['totalCount'] = count($photoRowset);
        return $photo;
    }
    
    /**
     * 覆載delete()，刪除照片檔案
     * @param int $id 照片ID
     */
    public function delete($id)
    {
        $photoRow = $this->getTable()->find($id)->current();
        @unlink(PHOTO_DIR . $photoRow->photoHashFile);
        @unlink(PHOTO_DIR . str_replace('.', '_thumb.', $photoRow->photoHashFile));

        // 檢查是否為封面圖片
        $albumRow = $photoRow->findParentRow('Table_Album');
        if ($albumRow->coverPhotoId == $photoRow->photoId) {
            $albumRow->coverPhotoId = 0;
            $albumRow->save();
        }

        parent::delete($id);
    }
    
    /**
     * 旋轉相片
     * @param int $id      照片ID
     * @param int $degrees 角度
     * @return string 訊息
     */
    public function rotate($id, $degrees)
    {
        $photoHashFile = $this->getTable()->find($id)->current()->photoHashFile;
        if (!$photoHashFile) {
            return false;
        }

        if (Image::rotate(PHOTO_DIR . $photoHashFile, $degrees) &&
            Image::rotate(PHOTO_DIR . str_replace('.', '_thumb.', $photoHashFile), $degrees)) {
            return '旋轉完成';
        } else {
            return '執行錯誤，檔案可能有問題';
        }
    }
}
?>
