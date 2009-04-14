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

<table id="calendar">
    <tr>
        <th>週一</th>
        <th>週二</th>
        <th>週三</th>
        <th>週四</th>
        <th>週五</th>
        <th>週六</th>
        <th>週日</th>
    </tr>
    <?php foreach ($this->calendar as $weekDays => &$calendar): ?>
        <?php
        // 設定類別
        if ($calendar['isPreMonth']) {
            $class = 'preMonth';
        } elseif ($calendar['isAfterMonth']) {
            $class = 'afterMonth';
        } else {
            $class = 'normal';
        }
        ?>
        <?php if ($weekDays % 7 == 0): ?>
            <tr>
        <?php endif; ?>
            <td class="<?php echo $class ?>"><?php echo $calendar['date'] ?></td>
        <?php if ($weekDays % 7 == 6): ?>
           </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

