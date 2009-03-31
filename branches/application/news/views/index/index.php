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
<?php $this->headTitle('最新消息') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/newsTable.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'newsIndex.css') ?>

<h1>最新消息</h1>

<?php echo $this->hyperLink('', '«回到首頁') ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->allowAddNews): ?>
    <div id="addNews">
        <?php echo $this->hyperLinK('news/add', '發佈新聞»') ?>
    </div>
<?php endif; ?>

<div id="newsPageNav">
    <?php $paginator = $this->newsTable->getPages();?>
    <?php if (isset($paginator->previous)): ?>
        <a id="prev" href="<?php echo $this->url(array('page' => $paginator->previous)) ?>">
            «上一頁
        </a>
    <?php else: ?>
        <span id="prev">«上一頁</span>
    <?php endif; ?>

    <?php foreach ($paginator->pagesInRange as $page): ?>
        <?php if ($page != $paginator->current): ?>
            <a class="pageNumber" href="<?php echo $this->url(array('page' => $page)) ?>">
                <?php echo $page; ?></a>
        <?php else: ?>
            <span id="currentPage"><?php echo $page; ?></span>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if (isset($paginator->next)): ?>
        <a id="next" href="<?php echo $this->url(array('page' => $paginator->next)); ?>">
            下一頁»
        </a>
    <?php else: ?>
        <span id="next">下一頁»</span>
    <?php endif; ?>
</div>

<?php if ($this->newsTable): ?>
    <div id="newsTable">
        <table summary="最新消息列表">
            <tr>
                <th class="postDate">發佈日期</th>
                <th class="isImportant"><?php echo $this->img('icon/important.png', '重要訊息')?></th>
                <th class="officeName">處室</th>
                <th class="titleName">職稱</th>
                <th class="newsTitle">標題</th>
            </tr>
            <?php foreach ($this->newsTable as &$news): ?>
                <tr>
                    <td class="postDate"><?php echo $news['postDate'] ?></td>
                    <td class="isImportant"><?php echo ($news['isImportant'] ? $this->img('icon/important.png', '重要訊息') : '&nbsp;') ?></td>
                    <td class="officeName"><?php echo $this->escape($news['officeName']) ?></td>
                    <td class="titleName"><?php echo $this->escape($news['titleName']) ?></td>
                    <td class="newsTitle"><?php echo $this->hyperLinK('news/view/index/id/' . $news['newsId'], $this->restrictString($news['newsTitle'], 30)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>