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
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/calendarDetailDialog.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/jQueryUI.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'calendarNav.js') ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->allowCalendar == true): ?>
    <div>
        <?php echo $this->hyperLink('calendar/event/add', '新增事件＋') ?>
    </div>
<?php endif; ?>

<table id="calendar" summary="<?php echo $this->escape($this->calendarCaption) ?>行事曆">
    <caption>
        <?php echo $this->escape($this->calendarCaption) ?>
    </caption>
    <tr id="calendarNav">
        <td id="preMonth">
            <?php echo $this->hyperLink('calendar/view/index/date/' . $this->preMonthYear . '-' . $this->preMonth, '«' . $this->preMonthYear . '年' . $this->preMonth . '月') ?>
        </td>
        <td colspan="5">
            &nbsp;
        </td>
        <td id="nextMonth">
            <?php echo $this->hyperLink('calendar/view/index/date/' . $this->nextMonthYear . '-' . $this->nextMonth, $this->nextMonthYear . '年' . $this->nextMonth . '月»') ?>
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
        <tr class="days">
            <?php foreach ($week as $weekDay => $day): ?>
                <td class="<?php echo $day['type']?>"><?php echo substr($day['date'], -5) ?></td>
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
                        <td onclick="showDetail('<?php echo 'detail' . $this->events[$row][$i][$j]['eventId'] . '_' . $row ?>')" class="event" title="<?php echo 'eventId' . $this->events[$row][$i][$j]['eventId']?>" colspan="<?php echo $this->events[$row][$i][$j]['colspan']?>"<?php if ($this->events[$row][$i][$j]['backgroundColor']): ?> style="background-color:<?php echo $this->events[$row][$i][$j]['backgroundColor'] ?>"<?php endif; ?>>
                            <?php if ($this->events[$row][$i][$j]['hasNext'] == true): ?>
                                <span class="hasNext">»</span>
                            <?php endif ?>
                            <?php if ($this->events[$row][$i][$j]['hasPre']): ?>
                                <span class="hasPre">«</span>
                            <?php endif ?>
                            
                            <?php echo $this->restrictString($this->events[$row][$i][$j]['eventName'], $this->events[$row][$i][$j]['colspan'] * 16) ?>

                            <div class="detail" id="<?php echo 'detail' . $this->events[$row][$i][$j]['eventId'] . '_' . $row?>" title="<?php echo $this->escape($this->events[$row][$i][$j]['eventName']) ?>">
                                <div class="datePeriod">
                                    <?php if ($this->events[$row][$i][$j]['startDate'] == $this->events[$row][$i][$j]['endDate']): ?>
                                        <?php echo $this->events[$row][$i][$j]['startDate'] ?>
                                    <?php else: ?>
                                        <?php echo $this->events[$row][$i][$j]['startDate'] . '～' . $this->events[$row][$i][$j]['endDate']?>
                                    <?php endif; ?>
                                </div>
                                <div class="eventDescription">
                                    <?php echo nl2br($this->escape($this->events[$row][$i][$j]['eventDescription']));?>
                                </div>
                                <?php if ($this->allowCalendar == true): ?>
                                    <div class="eventNav">
                                        <?php echo $this->hyperLink('calendar/event/edit/id/' . $this->events[$row][$i][$j]['eventId'], '編輯') ?>
                                        |
                                        <?php echo $this->hyperLink('calendar/event/delete/id/' . $this->events[$row][$i][$j]['eventId'], '刪除', array('class' => 'deleteAction')) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    <?php endforeach; ?>
</table>