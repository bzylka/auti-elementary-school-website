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
<?php $this->headTitle('最新消息')->headTitle('連結') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>

<h1>最新消息連結管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->newsLinkForm ?>
</div>