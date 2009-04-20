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
<?php $this->headTitle('管理介面')->headTitle('事件類別管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/farbtastic.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/farbtastic.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'callFarbtastic.js') ?>

<h1>事件類別管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->eventCatalogList): ?>
    <div id="eventCatalogList">
        <table summary="事件類別列表">
            <tr>
                <th class="eventCatalogName">事件類別名稱</th>
                <th class="backgroundColor">背景顏色</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->eventCatalogList as &$eventCatalog): ?>
                <tr>
                    <td class="eventCatalogName"><?php echo $this->escape($eventCatalog['eventCatalogName']) ?></td>
                    <td class="backgroundColor" style="padding:2px; color:blue; background-color:<?php echo $eventCatalog['backgroundColor'] ?>">測試顏色</td>
                    <td class="edit"><?php echo $this->hyperLinK('admin/eventCatalog/edit/id/' . $eventCatalog['eventCatalogId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLinK('admin/eventCatalog/delete/id/' . $eventCatalog['eventCatalogId'], '刪除') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->eventCatalogForm ?>
</div>

<div id="colorpicker"></div>