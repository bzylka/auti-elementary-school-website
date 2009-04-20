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
 * Table_Event
 *
 * 行事曆項目資料表
 */
class Table_Event extends Table_Abstract
{
    /**
     * @var string 資料表名稱
     * @access protected
     */
    protected $_name = 'event';

    /**
     * 定義關聯
     */
    protected $_referenceMap = array(
        'EventCatalog' => array(
            'columns'       => 'eventCatalogId',
            'refTableClass' => 'Table_EventCatalog',
            'refColumns'    => 'eventCatalogId'
        )
    );
}
?>
