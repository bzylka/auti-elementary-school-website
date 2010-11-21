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
<?php $this->headTitle('管理介面')->headTitle('首頁相簿隨機展示') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'adminSlideShow.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'setSlideShow.js') ?>

<h1>首頁相簿隨機展示</h1>

<div id="attention">點選核取方塊即可完成首頁相簿展示設定。此外30天內的新相簿也會自動顯示。</div>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->slideShowForm ?>
</div>