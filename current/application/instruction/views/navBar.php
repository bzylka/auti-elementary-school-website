<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */
?>
<div id="navBar">
    目前位置：
    <?php if ($this->page == 'instrunction'): ?>
        <span id="selected">學校簡介</span>
    <?php else: ?>
        <?php echo $this->hyperLink('instruction', '學校簡介')?>
    <?php endif; ?>
     <small>|</small>
    <?php if ($this->page == 'vision'): ?>
        <span id="selected">願景</span>
    <?php else: ?>
        <?php echo $this->hyperLink('instruction/vision', '願景')?>
    <?php endif; ?>
    <small>|</small>
    <?php if ($this->page == 'traffic'): ?>
        <span id="selected">交通資訊</span>
    <?php else: ?>
        <?php echo $this->hyperLink('instruction/traffic', '交通資訊')?>
    <?php endif; ?>
    <small>|</small>
    <?php if ($this->page == 'schoolSong'): ?>
        <span id="selected">校歌</span>
    <?php else: ?>
        <?php echo $this->hyperLink('instruction/schoolSong', '校歌')?>
    <?php endif; ?>
</div>
