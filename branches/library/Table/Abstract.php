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
 * Table_Abstract
 *
 * 資料表的CRUD處理，處理後訊息回傳，以及自訂的查詢功能。
 */
abstract class Table_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var array 要取得的欄位
     * @access private
     */
    private $_columns;
    
    /**
     * @var string 查詢條件
     * @access private
     */
    private $_where;
    
    /**
     * @var array 排序條件
     * @access private
     */
    private $_order;
    
    /**
     * @var int 查詢數量限制
     * @access private
     */
    private $_limit;
    
    /**
     * @var int 限制偏移值
     * @access private
     */
    private $_offset = 0;
    
    /**
     * 呼叫Zend_Db_Table_Abstract的_setupTableName()
     */
    protected function _setupTableName()
    {
        parent::_setupTableName();
    }

    /**
     * 新增一筆資料
     * @param array $data 要新增的資料
     * @return string 結果訊息
     */
    public function addData($data)
    {
        $insertRow = $this->createRow($data);
        $insertRow->save();
        
        try {
            return '新增《' . $insertRow->{$this->_name . 'Name'} . '》成功';
        } catch (Exception $e) {
            return '新增成功';
        }
    }
    
    /**
     * 更新資料
     * @param array $data 要更新的資料
     * @param int   $id   要更新的ID
     * @return string 結果訊息
     */
    public function updateData($data, $id)
    {
        if ($updateRow = $this->find($id)->current()) {
            $updateRow->setFromArray($data);
            $updateRow->save();
            try {
                return '更新《' . $updateRow->{$this->_name . 'Name'} . '》完成';
            } catch (Exception $e) {
                return '更新完成';
            }
        } else {
            return '查無資料，無法更新';
        }
    }
    
    /**
     * 刪除資料
     * @param int $id 要刪除的ID
     * @return string 結果訊息
     */
    public function deleteData($id)
    {
        if ($deleteRow = $this->find($id)->current()) {
            try {
                $name = $deleteRow->{$this->_name . 'Name'};
            } catch (Exception $e) {
                $name = null;
            }
            
            $deleteRow->delete();
            if ($name) {
                return '刪除《' . $name . '》完成';
            } else {
                return '刪除完成';
            }
        } else {
            return '查無資料，無法刪除';
        }
    }
    
    /**
     * 設定要讀取的欄位
     * @param string $columns 要取得的欄位
     * @return $this
     */
    public function columns($columns)
    {
        $this->_columns = (array)$columns;
        return $this;
    }
    
    /**
     * 設定where
     * @param string $where SQL的Where敘述
     * @return $this
     */
    public function where($where)
    {
        $this->_where = $where;
        return $this;
    }
    
    /**
     * 設定order
     * @param array $order SQL的Order敘述
     * @return $this
     */
    public function order($order)
    {
        $this->_order = (array)$order;
        return $this;
    }
    
    /**
     * 設定limit
     * @param int $limit 查詢限制數量
     * @return $this
     */
    public function limit($limit)
    {
        $this->_limit = $limit;
        return $this;
    }
    
    /**
     * 設定offset
     * @param array $limit 查詢偏移值
     * @return $this
     */
    public function offset($offset)
    {
        $this->_offset = $offset;
        return $this;
    }
    
    /**
     * 取得查詢的Rowset
     * @return object 資料庫查詢Rowset
     */
    public function getRowset()
    {
        $select = $this->select();
        
        if ($this->_columns) {
            $select->from($this, $this->_columns);
        }
        
        if ($this->_where) {
            $select->where($this->_where);
        }
        
        if ($this->_order) {
            $select->order($this->_order);
        }
        
        if ($this->_limit) {
            $select->limit($this->_limit, $this->_offset);
        }
        
        return parent::fetchAll($select);
    }
    
    /**
     * 取得最後插入的ID
     * @return int ID
     */
    public function getLastInsertId()
    {
        return $this->getAdapter()->lastInsertId();
    }
}
?>
