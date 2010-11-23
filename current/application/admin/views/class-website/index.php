<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */
?>
<?php $this->headTitle('管理介面')->headTitle('班級網頁管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle4.css') ?>

<h1>班級網頁管理</h1>

<div id="attention">未設定班級網頁的班級不會顯示在首頁左側的選單上</div>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->classTable): ?>
    <div id="classTable">
        <table summary="班級列表" class="tableStyle4">
            <tr>
                <th class="className">班級名稱</th>
                <th class="classWebsite">班級網頁</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->classTable as &$class): ?>
                <tr>
                    <td class="className"><?php echo $this->escape($class['className']) ?></td>
                    <td class="classWebsite"><?php if ($class['classWebsite']): echo '<a class="external" href="' . $class['classWebsite'] . '" target="_blank">班級網頁</a>'; else: echo '無班級網頁設定';endif; ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/classWebsite/edit/id/' . $class['classId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/classWebsite/delete/id/' . $class['classId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->classForm ?>
</div>