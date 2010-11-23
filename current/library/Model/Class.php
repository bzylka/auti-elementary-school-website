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
 * Model_Class
 *
 * 班級處理
 */
class Model_Class extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'Class';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Class';

    /**
     * 取得班級資料
     * @return obj 相簿年份的Rowset
     */
    public function getClasses()
    {
        return $this->getTable()->order('className')->getRowset();
    }
}
?>
