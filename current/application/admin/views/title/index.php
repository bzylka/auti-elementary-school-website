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
<?php $this->headTitle('管理介面')->headTitle('職稱管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle3.css') ?>

<h1>職稱管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->titleTable): ?>
    <div id="titleTable">
        <table summary="職稱列表" class="tableStyle3">
            <tr>
                <th class="officeName">所屬處室</th>
                <th class="titleName">職稱</th>
                <th class="titleEnglishName">英文名稱</th>
                <th class="displayOrder">顯示順序</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->titleTable as &$title): ?>
                <tr>
                    <td class="officeName"><?php echo $title['officeName'] ?></td>
                    <td class="titleName"><?php echo $title['titleName'] ?></td>
                    <td class="titleEnglishName"><?php echo $title['titleEnglishName'] ?></td>
                    <td class="displayOrder"><?php echo $title['displayOrder'] ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/title/edit/id/' . $title['titleId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/title/delete/id/' . $title['titleId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->titleForm ?>
</div>