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
<?php $this->headTitle('管理介面')->headTitle('相簿年份管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle2.css') ?>

<h1>相簿年份管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->albumYearTable): ?>
    <div id="albumYearTable">
        <table summary="相簿年份列表" class="tableStyle2">
            <tr>
                <th class="albumYearName">相簿年份</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->albumYearTable as &$albumYear): ?>
                <tr>
                    <td class="albumYearName"><?php echo $this->escape($albumYear['albumYearName']) ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/albumYear/edit/id/' . $albumYear['albumYearId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/albumYear/delete/id/' . $albumYear['albumYearId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->albumYearForm ?>
</div>