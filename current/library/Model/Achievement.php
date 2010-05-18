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
 * Model_Achievement
 *
 * 成果區塊處理
 */
class Model_Achievement extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Achievement';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Achievement';
    
    /**
     * 取得成果列表
     * @return array 成果列表
     */
    public function getAchievementList()
    {
        return $this->getTable()->order('displayOrder')->getRowset()->toArray();
    }
    
    /**
     * 取得成果資料夾檔案內容
     * @param int $id 成果ID
     * @return array 成果資料夾檔案內容
     */
    public function getFileList($id)
    {
        $achievementRow = $this->getTable()->find($id)->current();
        
        if (!$achievementRow) {
            return false;
        }
        
        $fileList = $this->_getFileListArray(DATA_DIR . $achievementRow->dirHash);
        
        return array('achievementName' => $achievementRow->achievementName,
                     'dirHash'         => $achievementRow->dirHash,
                     'fileList'        => $fileList);
    }
    
    /**
     * 覆載delete()，刪除檔案資料夾
     * @param int $id 成果ID
     */
    public function delete($id)
    {
        if ($achievementRow = $this->getTable()->find($id)->current()) {
            $this->_removeDir(DATA_DIR . $achievementRow->dirHash);
        }
        
        parent::delete($id);
    }
    
    /**
     * 成果檔案下載
     * @param $id       int    成果ID
     * @param $filePath string 成果檔案路徑
     */
    public function download($id, $filePath)
    {
        if ($achievementRow = $this->getTable()->find($id)->current()) {

            // 處理Linux和Windows儲存檔名的差異
            $achievementFilePath = $achievementRow->dirHash . $filePath;
            if (!is_file(DATA_DIR . $achievementFilePath)) {
                // Windows系統要轉換成Big5編碼
                $achievementFilePath = mb_convert_encoding($achievementFilePath, 'Big5');
            }
            
            // 處理IE瀏覽器，下載檔名轉換成Big5編碼
            $fileName = FileInfo::convertToUTF8(basename($achievementFilePath));
            $known = array('msie', 'firefox', 'safari', 'webkit', 'opera', 'netscape', 'konqueror', 'gecko');
            preg_match_all( '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9]+(?:\.[0-9]+)?)#', strtolower($_SERVER['HTTP_USER_AGENT']), $browser);
            if ($browser['browser'][0] == 'msie') {
                $fileName = mb_convert_encoding($fileName, 'Big5');
            }
            
            // 執行下載檔案動作
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize(DATA_DIR . $achievementFilePath));
            header('Content-Disposition: attachment; Filename="' . $fileName . '"');
            echo file_get_contents(DATA_DIR . $achievementFilePath);
            exit;
        } else {
            echo 'ID錯誤，請回上一頁';
        }
    }
    
    /**
     * 遞迴刪除資料夾檔案
     * @param string $dir 要刪除的資料夾
     * @return bool 刪除結果
     */
    private function _removeDir($dir)
    {
    	// 取得檔案、目錄列表
        $entryArray = scandir($dir);
        unset($entryArray[0]);
        unset($entryArray[1]);

        foreach ($entryArray as $entry) {
            if (is_dir($dir . '/' . $entry)) {
                $this->_removeDir($dir . '/' . $entry);
            } else {
                unlink($dir . '/' . $entry);
            }
        }
        
        rmdir($dir);
        return true;
    }
    
    /**
     * 遞迴取得資料夾內容
     * @param string $directory 資料夾名稱
     * @return array 資料夾內容
     */
    private function _getFileListArray($directory)
    {
        // 取得檔案列表
        $entryArray = scandir($directory);
        unset($entryArray[0]);
        unset($entryArray[1]);

        // 分開目錄和檔案並且排序
        $dirList  = array();
        $fileList = array();
        foreach ($entryArray as $entry) {
            if (is_dir($directory . '/' . $entry)) {
                $dirList[] = $entry;
            } else {
                $fileList[] = $entry;
            }
        }
        natcasesort($dirList);
        natcasesort($fileList);

        // 繼續尋找目錄的檔案
        $fileDirArray = array();
        foreach ($dirList as $dir) {
            $dirName = FileInfo::convertToUTF8($dir);
            $fileDirArray[$dirName] = $this->_getFileListArray($directory . '/' . $dir);
        }

        // 處理檔案
        foreach ($fileList as $file) {
            $fileDirArray[] = FileInfo::convertToUTF8($file);
        }

        return $fileDirArray;
    }
}
?>
