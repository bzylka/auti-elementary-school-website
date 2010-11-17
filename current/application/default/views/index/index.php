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
<?php $this->headMeta()->prependName('google-site-verification', 'zocX_f_SGDzeMPE2jMcbDsHut7sulKV5epyc4F0x7VA') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'defaultIndex.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/newsTable.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/jQueryUI.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'callCalendarBlock.js') ?>

<div id="left">
    <div id="news" class="contentBlock">
        <div class="blockHeader">
            <?php if ($this->allowAddNews): ?>
                <span class="blockNav adminNav">
                    <?php echo $this->hyperLink('news/add', '發佈新聞 »') ?>
                </span>
            <?php endif; ?>
            最新消息
        </div>
        <div class="blockContent">
            <div id="newsTable">
                <table summary="新聞列表">
                    <tr>
                        <th class="postDate">日期</th>
                        <th class="officeName">處室</th>
                        <th class="isImportant"><?php echo $this->img('icon/important.png', '重要訊息')?></th>
                        <th class="titleName">職稱</th>
                        <th class="newsTitle">標題</th>
                    </tr>
                    <?php foreach ($this->newsTable as &$news): ?>
                        <tr>
                            <td class="postDate"><?php echo str_replace('-', '.', substr($news['postDate'], 5)) ?></td>
                            <td class="officeName"><?php echo $this->escape($news['officeName']) ?></td>
                            <td class="isImportant"><?php echo ($news['isImportant'] ? $this->img('icon/important.png', '重要訊息') : '&nbsp;') ?></td>
                            <td class="titleName"><?php echo $this->escape($news['titleName']) ?></td>
                            <td class="newsTitle"><?php echo $this->hyperLink('news/view/index/id/' . $news['newsId'], $this->restrictString($news['newsTitle'], 35)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" class="more"><?php echo $this->hyperLink('news', '更多最新消息»') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="album" class="contentBlock">
        <div class="blockHeader">
            相簿
            <?php if ($this->photos): ?>
                -&nbsp;<?php echo $this->escape($this->photos['albumName']) ?>
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
                <?php echo $this->hyperLink('album/view/index/id/' . $this->photos['albumId'], '更多《' . $this->photos['albumName'] . '》的相片»') ?>
            </div>
        </div>
    </div>
</div>

<div id="right">
    <div id="calendar" class="contentBlock">
        <div class="blockHeader">
            <span class="blockNav">
                <?php echo $this->ajaxLink("getCalendarBlock('', 'down')", '〈回到本月行事曆〉') ?>
            </span>
            行事曆
        </div>
        <div id="calendarMessage">

        </div>
        <div class="blockContent">
        </div>
    </div>
</div>