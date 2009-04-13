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
<?php $this->headTitle('行事曆') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'calendarView.css') ?>

<?php if ($this->allowAlbum): ?>
    <?php echo $this->hyperLink('album/add', '新增事件＋') ?>
<?php endif; ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

