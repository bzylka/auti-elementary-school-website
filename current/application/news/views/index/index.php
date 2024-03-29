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

<?php if ($this->message): ?>
    <span style="display:inline-block; margin-left:1em;">
        <?php echo $this->messageBlock($this->message) ?>
    </span>
<?php endif; ?>

<?php if ($this->allowAddNews): ?>
    <div id="addNews" class="adminNav">
        <?php echo $this->hyperLink('news/add', '發佈新聞»') ?>
    </div>
<?php endif; ?>

<div id="newsPageNav">
    <?php $paginator = $this->paginator->getPages();?>
    <?php if (isset($paginator->previous)): ?>
        <a id="prev" href="<?php echo $this->url(array('page' => $paginator->previous)) ?>">
            «上一頁
        </a>
    <?php else: ?>
        <span id="prev">«上一頁</span>
    <?php endif; ?>

    <?php foreach ($paginator->pagesInRange as $page): ?>
        <?php if ($page != $paginator->current): ?>
            [<a class="pageNumber" href="<?php echo $this->url(array('page' => $page)) ?>">
                <?php echo $page; ?></a>]
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
                <th class="postDate">日期</th>
                <th class="officeName">處室</th>
                <th class="newsTitle">標題</th>
            </tr>
            <?php foreach ($this->newsTable as &$news): ?>
                <tr>
                    <td class="postDate"><?php echo str_replace('-', '.', substr($news['postDate'], 5)) ?></td>
                    <td class="officeName"><?php echo $this->escape($news['officeName']) ?></td>
                    <td class="newsTitle<?php echo ($news['isImportant'] ? ' isImportant': '') ?>"><?php echo $this->hyperLink('news/view/index/id/' . $news['newsId'] . '/backTo/news/backPage/' . $this->backPage, $this->restrictString($news['newsTitle'], 80)) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>