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
<?php $this->headTitle('管理介面')->headTitle('設定權限資源') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'adminAccessResource.css') ?>

<h1>資源管理</h1>

<h2>＊請勿任意更動這邊的資料，除非你要幫忙寫程式＊</h2>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<ul>
<?php foreach ($this->accessList as $access): ?>
    <li class="privilegeName">
        <?php echo $access['privilegeName'] ?>
    </li>
    <?php if ($access['resource']): ?>
        <ul>
        <?php foreach ($access['resource'] as $resource): ?>
            <li class="resourceList">
                <?php echo $resource['resourceName'] . '&nbsp;' . $this->hyperLink('admin/accessResource/delete/id/' . $resource['accessId'], '【X】') ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endforeach; ?>
</ul>

<div class="formContainer">
    <?php echo $this->privilegeAccessForm ?>
</div>