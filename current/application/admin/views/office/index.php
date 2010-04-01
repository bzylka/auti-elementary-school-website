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
<?php $this->headTitle('管理介面')->headTitle('處室管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle2.css') ?>

<h1>處室管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->officeTable): ?>
    <div id="officeTable">
        <table summary="處室列表" class="tableStyle2">
            <tr>
                <th class="office">處室</th>
                <th class="officeEnglishName">英文名稱</th>
                <th class="displayOrder">顯示順序</th>
                <th class="testLink">測試處室連結</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->officeTable as &$office): ?>
                <tr>
                    <td class="office"><?php echo $office['officeName'] ?></td>
                    <td class="officeEnglishName"><?php echo $office['officeEnglishName'] ?></td>
                    <td class="displayOrder"><?php echo $office['displayOrder'] ?></td>
                    <td class="testLink"><?php if ($office['officeLink']): echo '<a class="external" href="' . $office['officeLink'] . '" target="_blank">測試</a>'; else: echo '無連結設定';endif; ?></td>
                    <td class="edit"><?php echo $this->hyperLinK('admin/office/edit/id/' . $office['officeId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLinK('admin/office/delete/id/' . $office['officeId'], '刪除', array('class' => 'deleteAction')) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->officeForm ?>
</div>