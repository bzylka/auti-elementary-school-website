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
 * Model_NewsLink
 *
 * 最新消息連結處理模組
 */
class Model_NewsLink extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'NewsLink';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'NewsLink';
}
?>
