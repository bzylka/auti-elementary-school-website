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
<?php $this->headTitle('管理介面')->headTitle('權限管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle5.css') ?>

<h1>權限管理</h1>

<h2>＊請勿任意更動這邊的資料，除非你要幫忙寫程式＊</h2>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->privilegeTable): ?>
    <div id="privilegeTable">
        <table summary="權限列表" class="tableStyle5">
            <tr>
                <th class="privilegeName">權限名稱</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->privilegeTable as &$privilege): ?>
                <tr>
                    <td class="privilegeName"><?php echo $privilege['privilegeName'] ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/privilege/edit/id/' . $privilege['privilegeId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/privilege/delete/id/' . $privilege['privilegeId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->privilegeForm ?>
</div>