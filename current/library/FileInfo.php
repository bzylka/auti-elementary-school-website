<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2009 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * FileInfo
 *
 * 檔案類型處理類別
 */
class FileInfo
{
    /**
     * @var string 檔案全名
     * access private
     */
    private $_baseName;
    
    /**
     * @var string 檔名（不含副檔名）
     * access private
     */
    private $_fileName;
    
    /**
     * @var string 副檔名
     * access private
     */
    private $_extension;

    /**
     * 設定檔案名稱，剖析檔案名稱
     */
    public function __construct($file)
    {
        if (!$file) {
            return false;
        }

        if (strpos($file, '/') !== false) {
            $this->_baseName = end(explode('/', $file));
        } elseif (strpos($file, '\\') !== false) {
            $this->_baseName = end(explode('\\', $file));
        } else {
            $this->_baseName = $file;
        }

        if (strpos($this->_baseName, '.') !== false) {
            $this->_extension = end(explode('.', $file));
            $this->_fileName = mb_substr($this->_baseName, 0, mb_strlen($this->_baseName) - mb_strlen($this->_extension) - 1);
        } else {
            $this->_extension = '';
            $this->_fileName = $this->_baseName;
        }
    }
    
    /**
     * 取得檔案訊息
     */
    public function __get($property)
    {
        if(isset($this->{'_' . $property})) {
            return $this->{'_' . $property};
        } else {
            return false;
        }
    }
}
?>
