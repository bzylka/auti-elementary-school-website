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
<?php $this->headTitle('錯誤') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/error.css') ?>
<?php $this->headMeta()->appendHttpEquiv('Refresh', '5;url=' . BASE_URL ) ?>

<?php echo $this->MessageBlock($this->message . '，將於5秒後自動轉跳到首頁') ?>

<br />

<div id="homePage">
    <?php echo $this->hyperLink('', '回到首頁首頁»') ?>
</div>