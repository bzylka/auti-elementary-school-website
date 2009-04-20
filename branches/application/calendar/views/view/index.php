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
    <tr id="calendarNav">
        <td id="leftNav" colspan="5">
            <?php echo $this->hyperLink('calendar/view/' . $this->type . '/date/' . $this->calendar['preDate'], '<<') ?>
            |
            <?php echo $this->hyperLink('calendar/view/' . $this->type . '/date/' . $this->calendar['afterDate'], '>>') ?>
            |
            <?php echo $this->hyperLink('calendar/view/' . $this->type, '今天') ?>
            |
            <span id="period">
                <?php echo $this->escape($this->period)?>
            <span>
        </td>
        <td class="pageNav">
            <div<?php if($this->type == 'by2Week'): echo ' id="selected"';endif; ?>>
                <?php echo $this->hyperLink('calendar/view/by2Week/date/' . $this->date, '兩週') ?>
            </div>
        </td>
        <td class="pageNav">
            <div<?php if($this->type == 'byMonth'): echo ' id="selected"';endif; ?>>
                <?php echo $this->hyperLink('calendar/view/byMonth/date/' . $this->date, '整月') ?>
            </div>
        </td>
    </tr>
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
                <td class="days"><?php echo substr($day, -5) ?></td>
            <?php endforeach; ?>
        </tr>
        
        <?php for ($j = 0; $j < 5; $j++): ?>
            <tr class="calendarSpace">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="eventRow">
                <?php for ($i = 0; $i < 7; $i++): ?>
                    <?php if ($this->events[$row][$i][$j] === true): ?>
                        <td>&nbsp;</td>
                    <?php elseif (is_array($this->events[$row][$i][$j])): ?>
                        <td class="event" colspan="<?php echo $this->events[$row][$i][$j]['colspan']?>" style="background-color:<?php echo $this->events[$row][$i][$j]['backgroundColor']?>">
                            <?php if ($this->events[$row][$i][$j]['hasNext'] == true): ?>
                                <span class="hasNext">»</span>
                            <?php endif ?>
                            <?php if ($this->events[$row][$i][$j]['hasPre']): ?>
                                <span class="hasPre">«</span>
                            <?php endif ?>
                            <?php echo $this->hyperLink('calendar/event/edit/id/' . $this->events[$row][$i][$j]['eventId'], $this->events[$row][$i][$j]['eventName']) ?>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    <?php endforeach; ?>
</table>

