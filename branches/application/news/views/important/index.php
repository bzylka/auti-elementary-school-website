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
<?php $this->headTitle('重要公告') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'newsImportant.css') ?>

<h1>重要公告</h1>

<?php echo $this->hyperLink('', '«回到首頁') ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->allowAddNews): ?>
    <div id="addNews">
        <?php echo $this->hyperLinK('news/add', '發佈»') ?>
    </div>
<?php endif; ?>

<?php if ($this->newsTable): ?>
<div id="importantNews">
    <?php foreach ($this->newsTable as $officeName => &$title): ?>
        <h2><?php echo $this->escape($officeName) ?></h2>
        <?php foreach ($title as $titleName => &$newsArray): ?>
            <h3><?php echo $this->escape($titleName) ?></h3>
            <ul>
                <?php foreach ($newsArray as &$news): ?>
                <li><?php echo $this->hyperLinK('news/view/index/id/' . $news['newsId'], $this->restrictString($news['newsTitle'], 30)) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>