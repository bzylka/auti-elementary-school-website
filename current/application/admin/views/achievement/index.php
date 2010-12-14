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
<?php $this->headTitle('管理介面')->headTitle('成果區塊管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle1.css') ?>

<h1>成果區塊管理</h1>

<div id="attention">請將成果檔案壓縮成.zip檔案上傳，最大1GB</div>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->achievementTable): ?>
    <div id="achievementTable">
        <table summary="成果區塊列表" class="tableStyle1">
            <tr>
                <th class="achievementName">成果區塊名稱</th>
                <th class="displayOrder">顯示順序</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->achievementTable as &$achievement): ?>
                <tr>
                    <td class="achievementName"><?php echo $this->escape($achievement['achievementName']) ?></td>
                    <td class="displayOrder"><?php echo $this->escape($achievement['displayOrder']) ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/achievement/edit/id/' . $achievement['achievementId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/achievement/delete/id/' . $achievement['achievementId'], '刪除',  array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->achievementForm ?>
</div>