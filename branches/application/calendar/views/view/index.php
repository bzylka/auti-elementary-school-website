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

<?php if ($this->allowAlbum = true): ?>
    <?php echo $this->hyperLink('calendar/event/add', '新增事件＋') ?>
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
    
    <?php foreach ($this->calendar['date'] as $row => $week): ?>
        <tr>
            <?php foreach ($week as $weekDay => $day): ?>
                <td><?php echo $day ?></td>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($this->events as $eventRow => $events): ?>
            <?php if ($eventRow == $row): ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>

