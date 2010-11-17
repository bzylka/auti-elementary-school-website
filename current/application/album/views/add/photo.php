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
<?php $this->headTitle('相簿')->headTitle('上傳相片') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>

<h1>上傳相片（支援.jpg、.png、.gif檔案，或檔案壓縮成.zip後上傳，大小上限1GB）</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->uploadForm ?>
</div>