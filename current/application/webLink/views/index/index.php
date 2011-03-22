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
<?php $this->headTitle('網路連結') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'webLinkIndex.css') ?>

<h1>網路連結</h1>

<?php if ($this->isAdmin): ?>
    <div id="addWebLink">
        <span class="blockNav adminNav">
            <?php echo $this->hyperLink('webLink/add', '新增連結»') ?>
        </span>
    </div>
<?php endif; ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->webLinks): ?>
    <div id="webLinkContainer">
    <?php foreach ($this->webLinks as &$webLink): ?>
        <div class="webLinkBlock">
            <a href="<?php echo str_replace('&', '&amp;', $webLink['link']) ?>" target="_blank">
                <?php echo $this->photo($webLink['iconHashFile'], '連結圖片-' . $webLink['linkName']) ?>
            </a>
            <p class="link">
                <a class="external" href="<?php echo str_replace('&', '&amp;', $webLink['link']) ?>" target="_blank">
                    <?php echo $this->restrictString($webLink['linkName'], 20) ?>
                </a>
            </p>
            <?php if ($this->isAdmin): ?>
                <?php if ($webLink['isShowOnIndex']): ?>
                    <p class="isShowOnIndex">
                        ↑連結顯示於首頁
                    </p>
                <?php endif; ?>
                <p class="webLinkNav">
                    <?php echo $this->hyperLink('webLink/edit/index/id/' . $webLink['webLinkId'], '編輯') ?>
                    ｜
                    <?php echo $this->hyperLink('webLink/delete/index/id/' . $webLink['webLinkId'], '刪除', array('class' => 'deleteAction')) ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>目前沒有連結</p>
<?php endif; ?>