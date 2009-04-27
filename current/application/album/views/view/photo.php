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
<?php $this->headTitle('相簿')->headTitle($this->photo['albumYearName'])->headTitle($this->photo['albumName']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'photoView.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'albumView.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/fancybox.css') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'jQuery/fancybox.js') ?>
<?php $this->headScript()->appendFile(JAVASCRIPT_URL . 'showLargePhoto.js') ?>

<div id="albumNav">
    <?php echo $this->hyperLink('album', '相簿')?>
    <span>»</span>
    <span>
        <?php if ($this->photo['albumYearName']): ?>
            <?php $albumYearName = $this->photo['albumYearName'] ?>
        <?php else: ?>
            <?php $albumYearName = '無年份'?>
        <?php endif; ?>
        <?php echo $this->hyperLink('album#' . $albumYearName, $albumYearName)?>
    </span>
    <span>»</span>
    <span id="albumName">
        <?php echo $this->escape($this->photo['albumName']) ?>
    </span>
    <span id="albumCover">
        <?php if ($this->photo['coverPhotoFile']): ?>
            <?php echo $this->photo($this->photo['coverPhotoFile'], $this->photo['albumName']) ?>
        <?php else: ?>
            <?php echo $this->img('noCoverPhoto.jpg', $this->photo['albumName']) ?>
        <?php endif; ?>
    </span>
    <span>»</span>
    <span id="fileName">
        <?php echo mb_convert_encoding($this->photo['fileName'], 'UTF-8') ?>
    </span>
</div>

<?php if ($this->photo['prevId'] || $this->photo['nextId']): ?>
    <div id="photoNav">
        相片<?php echo $this->photo['count'] ?>，總數為<?php echo $this->photo['totalCount'] ?>
        <small>｜</small>
        <?php echo $this->img('template/img/upNarrow.png', '檢視全部相片')?>
        <?php echo $this->hyperLink('album/view/index/id/' . $this->photo['albumId'], '檢視全部相片') ?>
        <small>｜</small>
        <?php echo $this->img('icon/backNarrow.png', '上一張')?>
        <?php if ($this->photo['prevId']): ?>
            <?php echo $this->hyperLink('album/view/photo/id/' . $this->photo['prevId'], '上一張') ?>
        <?php else: ?>
            上一張
        <?php endif; ?>
        <small>｜</small>
        <?php if ($this->photo['nextId']): ?>
            <?php echo $this->hyperLink('album/view/photo/id/' . $this->photo['nextId'], '下一張') ?>
        <?php else: ?>
            下一張
        <?php endif; ?>
        <?php echo $this->img('icon/forwardNarrow.png', '下一張')?>
        <small>｜</small>
        <?php echo $this->img('icon/fullScreenView.png', '放大檢視')?>
        <a href="#photoView" title="<?php echo mb_convert_encoding($this->photo['fileName'], 'UTF-8') ?>" id="showLargePhoto">放大檢視</a>
    </div>
<?php endif; ?>
    
<div id="infoBlock">
    <?php if ($this->isAdmin): ?>
        <span id="infoNav">
            <span id="setAlbumCover"><?php echo $this->hyperLink('album/setCover/index/id/' . $this->photo['photoId'] . '/albumId/' . $this->photo['albumId'], '設定為相簿封面') ?></span>
            |
            <span id="rotateLeft"><?php echo $this->hyperLink('album/rotateLeft/photo/id/' . $this->photo['photoId'], '左旋90度') ?></span>
            |
            <span id="rotateRight"><?php echo $this->hyperLink('album/rotateRight/photo/id/' . $this->photo['photoId'], '右旋90度') ?></span>
            |
            <span id="deletePhoto"><?php echo $this->hyperLink('album/delete/photo/id/' . $this->photo['photoId'] . '/albumId/' . $this->photo['albumId'], '刪除此張相片') ?></span>
        </span>
    <?php endif; ?>
    
    <span>日期：<?php echo $this->photo['uploadDate'] ?></span>
    <span>上傳者：<?php echo $this->photo['userName'] ?></span>
    
    <?php if ($this->message): ?>
        <small>|</small>
        <span id="message">
            <?php echo $this->message ?>
        </span>
    <?php endif; ?>
</div>

<div id="photoContainer">
    <div id="photoView">
        <?php echo $this->photo($this->photo['photoHashFile'], $this->photo['fileName']) ?>
    </div>

    <div id="photoDescriptionContainer">
        <?php if ($this->isAdmin): ?>
            <div id="photoDescriptionNav">
                <?php echo $this->ajaxLink('$(\'#photoDescription\').css({\'display\':\'block\'});$(\'.formContainer\').css({\'display\':\'inline\'});', '編輯說明文字');?>
                /
                <span><?php echo $this->hyperLink('album/delete/photoDescription/id/' . $this->photo['photoId'], '刪除說明文字') ?></span>
            </div>
        <?php endif; ?>
        
        <span id="photoDescriptionText">
            <?php echo $this->escape($this->photo['photoDescription']) ?>
        </span>
    </div>

    <div class="formContainer" style="display: none;">
        <?php echo $this->photoDescriptionForm ?>
    </div>
</div>