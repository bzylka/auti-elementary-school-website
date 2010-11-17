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
?>
<div id="adminNav" class="grid_3">
    <ul>
        <li class="navTitle">使用者管理</li>
        <li><?php echo $this->hyperLink('admin/office', '處室管理')?></li>
        <li><?php echo $this->hyperLink('admin/title', '職稱管理')?></li>
        <li><?php echo $this->hyperLink('admin/user', '使用者管理')?></li>
        <li class="navTitle">系統權限</li>
        <li><?php echo $this->hyperLink('admin/privilege', '權限管理')?></li>
        <li><?php echo $this->hyperLink('admin/resource', '資源管理')?></li>
        <li><?php echo $this->hyperLink('admin/accessResource', '資源存取管理')?></li>
        <li class="navTitle">相簿</li>
        <li><?php echo $this->hyperLink('admin/albumYear', '相簿年份管理')?></li>
        <li><?php echo $this->hyperLink('admin/slideShow', '首頁相簿展示')?></li>
        <li class="navTitle">班級</li>
        <li><?php echo $this->hyperLink('admin/classWebsite', '班級網頁管理')?></li>
        <li class="navTitle">行事曆</li>
        <li><?php echo $this->hyperLink('admin/eventCatalog', '事件類別管理')?></li>
        <li class="navTitle">成果區塊</li>
        <li><?php echo $this->hyperLink('admin/achievement', '成果區塊管理')?></li>
        <li class="navTitle">系統狀態</li>
        <li><?php echo $this->hyperLink('admin/state', '系統狀態')?></li>
    </ul>
</div>


        
