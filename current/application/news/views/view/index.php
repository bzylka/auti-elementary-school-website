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
<?php $this->headTitle('最新消息')->headTitle($this->newsData['newsTitle']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'newsView.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>

<?php echo $this->ajaxLink('history.go(-1)', '«回上一頁') ?>

<h1>
    <?php if ($this->isAdmin): ?>
        <span class="newsNav">
            <?php echo $this->img('icon/edit.png', '編輯') ?>
            <?php echo $this->hyperLink('news/edit/index/id/' . $this->newsData['newsId'], '編輯內容') ?>
            &nbsp;
            <?php echo $this->img('icon/delete.png', '刪除') ?>
            <?php echo $this->hyperLink('news/delete/index/id/' . $this->newsData['newsId'], '刪除', array('class' => 'deleteAction')) ?>
            &nbsp;
            <?php echo $this->img('icon/downloadAttachment.png', '新增附件') ?>
            <?php echo $this->hyperLink('news/attachment/add/newsId/' . $this->newsData['newsId'], '新增附件')?>
            &nbsp;
            <?php echo $this->img('icon/newsLink.png', '新增連結') ?>
            <?php echo $this->hyperLink('news/link/add/newsId/' . $this->newsData['newsId'], '新增連結')?>
        </span>
    <?php endif; ?>
    <?php echo $this->escape($this->newsData['newsTitle']) ?>
    <?php if ($this->message): ?>
        <span>│<?php echo $this->messageBlock($this->message) ?></span>
    <?php endif; ?>
</h1>

<div id="newsContent">
    <?php echo nl2br($this->escape($this->newsData['newsContent'])) ?>
</div>

<?php if ($this->newsData['link']): ?>
    <fieldset id="link">
        <legend>參考連結</legend>
        <ul>
        <?php foreach ($this->newsData['link'] as &$link): ?>
            <li>
                <?php if ($this->isAdmin): ?>
                    <small>
                    （
                    <?php echo $this->hyperLink('news/link/edit/id/' . $link['linkId'] . '/newsId/' . $this->newsData['newsId'], '編輯')?>
                    ｜
                    <?php echo $this->hyperLink('news/link/delete/id/' . $link['linkId'] . '/newsId/' . $this->newsData['newsId'], '刪除', array('class' => 'deleteAction'))?>
                    ）
                    </small>
                <?php endif; ?>

                <?php echo $this->img('icon/newsLink.png', $link['linkName']) ?>
                <?php echo '<a class="external" href="' . $link['link'] . '" target="_blank">' . $this->escape($link['linkName']) . '</a>' ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </fieldset>
<?php endif; ?>

<?php if ($this->newsData['attachment']): ?>
    <fieldset id="attachment">
        <legend>附件下載</legend>
        <?php foreach ($this->newsData['attachment'] as &$attachment): ?>
            <div class="file">
                <?php if ($this->isAdmin): ?>
                    <small>
                    （
                    <?php echo $this->hyperLink('news/attachment/edit/id/' . $attachment['attachmentId'] . '/newsId/' . $this->newsData['newsId'], '編輯')?>
                    ｜
                    <?php echo $this->hyperLink('news/attachment/delete/id/' . $attachment['attachmentId'] . '/newsId/' . $this->newsData['newsId'], '刪除', array('class' => 'deleteAction'))?>
                    ）
                    </small>
                <?php endif; ?>
                <?php echo $this->img('icon/downloadAttachment.png', '附件下載-' . $attachment['fileName']) ?>
                <?php echo $this->hyperLink('news/attachment/download/id/' . $attachment['attachmentId'], $attachment['fileName']) ?>
            </div>
        <?php endforeach; ?>
    </fieldset>
<?php endif; ?>

<div id="newsInfo">
    <?php echo $this->newsData['officeName'] .
               '╱' .
               $this->newsData['titleName'] .
               '╱' .
               '<strong style="color:#A5A5A5">' .
               $this->newsData['userName'] .
               '</strong>｜' .
               $this->newsData['postDate'] .
               '&nbsp;' .
               $this->newsData['postTime'] .
               '發佈' ?>
</div>