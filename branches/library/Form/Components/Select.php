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
 * Form_Components_Select
 *
 * 下拉選單
 */
class Form_Components_Select extends Zend_Form_Element_Select
{ 
    /**
     * 建構子
     * 請在$option中輸入
     * $option['Table'] = 要讀取的資料表名稱
     * $option['columnPair'] = 要配對的欄位內容，array('resourceId', 'resourceName')
     * $option['defaultValue'] = 預設內容，array('0' => '無')
     */
   public function __construct($name, $options)
    {
        parent::__construct($name, $options);
        
        // 加入NotEmpty的設定
        if ($options['required'] == true) {
            $this->addValidator('NotEmpty', true, array('messages' => $this->getLabel() . '不能空白'));
        }
        
        $tableClass = 'Table_' . $options['table'];
        $table = new $tableClass();
        
        $valueArray = $table->columns($options['columnPair'])->getRowset()->toArray();
        if (isset($valueArray)) {
            foreach ($valueArray as &$value) {
                $multiOptions[$value[$options['columnPair'][0]]] = $value[$options['columnPair'][1]];
            }
        }
        
        $multiOptions += $options['defaultValue'];
        ksort($multiOptions);

        $this->addValidator('Int', true, array('messages' => $this->getLabel() . '選單必需為整數'))
             ->addMultiOptions($multiOptions);
    }
}
?>