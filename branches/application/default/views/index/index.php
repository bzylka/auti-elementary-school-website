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
<?php $this->headLink()->appendStylesheet(CSS_URL . 'defaultIndex.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/newsTable.css') ?>

<div id="news" class="contentBlock">
    <div class="blockHeader">
        <?php if ($this->allowAddNews): ?>
            <span class="blockNav">
                <?php echo $this->hyperLinK('news/add', '發佈新聞 »') ?>
            </span>
        <?php endif; ?>
        最新消息
    </div>
    <div class="blockContent">
        <div id="newsTable">
            <table summary="新聞列表">
                <tr>
                    <th class="postDate">發佈日期</th>
                    <th class="officeName">處室</th>
                    <th class="isImportant"><?php echo $this->img('icon/important.png', '重要訊息')?></th>
                    <th class="titleName">職稱</th>
                    <th class="newsTitle">標題</th>
                </tr>
                <?php foreach ($this->newsTable as &$news): ?>
                    <tr>
                        <td class="postDate"><?php echo $news['postDate'] ?></td>
                        <td class="officeName"><?php echo $this->escape($news['officeName']) ?></td>
                        <td class="isImportant"><?php echo ($news['isImportant'] ? $this->img('icon/important.png', '重要訊息') : '&nbsp;') ?></td>
                        <td class="titleName"><?php echo $this->escape($news['titleName']) ?></td>
                        <td class="newsTitle"><?php echo $this->hyperLink('news/view/index/id/' . $news['newsId'], $this->restrictString($news['newsTitle'], 17)) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" class="more"><?php echo $this->hyperLink('news', '更多…') ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div id="calendar" class="contentBlock">
    <div class="blockHeader">
        行事曆
    </div>
    <div class="blockContent">
        <div >
            <table id="dates">
                <tr>
                    <td id="caption" colspan="7">
                        <?php echo $this->calendarCaption ?>
                    </td>
                </tr>
                <tr>
                    <th>一</th>
                    <th>二</th>
                    <th>三</th>
                    <th>四</th>
                    <th>五</th>
                    <th>六</th>
                    <th>日</th>
                </tr>
                <?php foreach ($this->calendar['date'] as $row => $week): ?>
                    <tr class="days">
                        <?php foreach ($week as $weekDay => $day): ?>
                            <td class="<?php echo $day['type']?><?php if ($weekDay % 7 == 5 || $weekDay % 7 == 6): echo ' weekEnd'; endif;?>"><?php echo (int)substr($day['date'], -2) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <hr />
        <div id="events">
            <?php foreach ($this->events as $eventRow): ?>
                <div class="datePeriod">
                    <?php if ($eventRow->startDate == $eventRow->endDate): ?>
                        <?php echo $eventRow->startDate ?>
                    <?php else: ?>
                        <?php echo $eventRow->startDate . '&nbsp;～&nbsp;' . $eventRow->endDate ?>
                    <?php endif; ?>
                </div>
                <div class="eventName">
                    <?php echo $this->escape($eventRow->eventName) ?>
                </div>
            <?php endforeach;?>
        </div>
        <div class="more" style="padding-top:0.5em;">
            <?php echo $this->hyperLink('calendar/view/byMonth/date/', '檢視細節…') ?>
        </div>
    </div>
</div>

<div id="album" class="contentBlock">
    <div class="blockHeader">
        相簿
        <?php if ($this->photos): ?>
            »
            <?php echo $this->hyperLink('album/view/index/id/' . $this->photos['albumId'], $this->photos['albumName']) ?>
        <?php endif; ?>
    </div>
    <div class="blockContent">
        <?php if ($this->photos): ?>
            <?php foreach ($this->photos['photos'] as &$photo): ?>
            <span>
                <a href="<?php echo BASE_URL . 'album/view/photo/id/' . $photo['photoId']?>">
                    <?php echo $this->photo(str_replace('.', '_thumb.', $photo['photoHashFile']), $photo['fileName']) ?>
                </a>
            </span>
            <?php endforeach; ?>
        <?php else: ?>
            <b>無設定顯示相簿</b>
        <?php endif; ?>
        <div class="more" style="padding-top:0.5em;">
            <?php echo $this->hyperLink('album', '更多…') ?>
        </div>
    </div>
</div>