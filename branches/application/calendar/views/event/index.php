<?php
/**
 * FreeLibrary圖書管理系統
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @category   View
 * @package    Script
 * @copyright  2008 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */
?>
<?php $this->headTitle('行事曆')->headTitle('事件管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/datepicker.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/datepicker.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/datepicker-zh-TW.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'callDatepickerRange.js') ?>

<h1>事件管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->eventForm ?>
</div>