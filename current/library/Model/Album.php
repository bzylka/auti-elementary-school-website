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
 * Model_Album
 *
 * 相簿處理
 */
class Model_Album extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Album';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Album';
    
    /**
     * 取得相簿列表
     * @return array 相簿列表
     */
    public function getAlbums()
    {
        $albumYear = new Table_AlbumYear();
        $albumYearRowset = $albumYear->order('albumYearId DESC')->getRowset();
        foreach ($albumYearRowset as $albumYearRow) {
            $albumRowset = $albumYearRow->findDependentRowset('Table_Album');
            foreach ($albumRowset as $albumRow) {
                $albumArray[$albumYearRow->albumYearName][] = array_merge($albumRow->toArray(),
                                                                          array('coverPhotoFile' => str_replace('.', '_thumb.', $albumRow->findParentRow('Table_Photo')->photoHashFile)));
            }
        }
        
        // 讀取無相簿年份
        $album = new Table_Album();
        $albumNoYearRowset = $album->where('albumYearId = 0')->getRowset();
        foreach ($albumNoYearRowset as $albumNoYear) {
            $albumArray['無年份'][] = array_merge($albumNoYear->toArray(),
                                                  array('coverPhotoFile' => str_replace('.', '_thumb.', $albumNoYear->findParentRow('Table_Photo')->photoHashFile)));
        }
        
        return $albumArray;
    }
    
    /**
     * 取得隨機相片
     * @param int $counts 取得數量
     * @return mixed 相片列表
     */
    public function getRandomPhotos($counts)
    {
        $albumRowset = $this->getTable()->where('isSlideShow = 1')->getRowset();
        
        if (count($albumRowset) == 0) {
            return false;
        }
        
        $albumCounts = count($albumRowset);
        $albumRow = $albumRowset[mt_rand(0, $albumCounts - 1)];
        $photos['albumId']   = $albumRow->albumId;
        $photos['albumName'] = $albumRow->albumName;
        $photos['photos']    = $albumRow->findDependentRowset('Table_Photo')->toArray();
        shuffle($photos['photos']);
        array_splice($photos['photos'], $counts);
        return $photos;
    }
    
    /**
     * 取得相簿的相片
     * @param int $id   相簿ID
     * @param int $page 頁數
     * @return array 相簿名稱、包含的相片
     */
    public function getAlbumPhotos($id, $page = 0)
    {
        $albumRow = $this->getTable()->find($id)->current();
        if (!$albumRow->albumName) {
            return false;
        }
        $album['albumData'] = array_merge($albumRow->toArray(),
                                          array('albumYearName' => $albumRow->findParentRow('Table_AlbumYear')->albumYearName),
                                          array('coverPhotoFile' => str_replace('.', '_thumb.', $albumRow->findParentRow('Table_Photo')->photoHashFile)));
        $photoRowset        = $albumRow->findDependentRowset('Table_Photo');
        foreach ($photoRowset as $photoRow) {
            $album['photos'][] = $photoRow->toArray();
        }
        
        return $album;
    }
    
    /**
     * 設定相簿封面
     * @param int $albumId 相簿ID
     * @param int $id      相片ID
     */
    public function setCover($albumIdm, $id)
    {
        $this->getTable()->updateData(array('coverPhotoId' => $id), $albumIdm);
    }
    
    /**
     * 覆載delete()，刪除相簿中的照片檔案
     * @param int $id 相簿ID
     */
    public function delete($id)
    {
        $photoRowset = $this->getTable()->find($id)->current()->findDependentRowset('Table_Photo');
        foreach ($photoRowset as $photoRow) {
            @unlink(PHOTO_DIR . $photoRow->photoHashFile);
            @unlink(PHOTO_DIR . str_replace('.', '_thumb.', $photoRow->photoHashFile));
        }

        parent::delete($id);
    }
}
?>
