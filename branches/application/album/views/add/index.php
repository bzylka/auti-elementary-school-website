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
<?php $this->headTitle('相簿')->headTitle('新增相簿') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/datepicker.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/jQueryUI.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/datepicker-zh-TW.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'callDatepicker.js') ?>

<h1>新增相簿</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->albumForm ?>
</div>