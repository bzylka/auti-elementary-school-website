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
<?php $this->headTitle('修改個人資料')->headTitle($this->userData['userName']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'userEdit.css') ?>

<h1>修改個人資料</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<div id="userPhoto">
    <?php echo $this->userPhoto($this->userData['userId']) ?>
</div>

<div class="formContainer">
    <?php echo $this->userForm ?>
</div>