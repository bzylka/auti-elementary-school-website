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
<?php $this->headTitle('管理介面')->headTitle('資源管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle3.css') ?>

<h1>資源管理</h1>

<h2>＊請勿任意更動這邊的資料，除非你要幫忙寫程式＊</h2>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->resourceTable): ?>
    <div id="resourceTable">
        <table summary="資源列表" class="tableStyle3">
            <tr>
                <th class="resourceName">資源名稱</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->resourceTable as &$resource): ?>
                <tr>
                    <td class="resourceName"><?php echo $resource['resourceName'] ?></td>
                    <td class="edit"><?php echo $this->hyperLink('admin/resource/edit/id/' . $resource['resourceId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLink('admin/resource/delete/id/' . $resource['resourceId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->resourceForm ?>
</div>