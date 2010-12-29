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
<?php $this->headTitle('相簿')->headTitle($this->album['albumData']['albumYearName'])->headTitle($this->album['albumData']['albumName']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'albumView.css') ?>

<div id="albumNav">
    <?php echo $this->hyperLink('album', '相簿')?>
    <span>»</span>
    <span>
        <?php if ($this->album['albumData']['albumYearName']): ?>
            <?php $albumYearName = $this->album['albumData']['albumYearName'] ?>
        <?php else: ?>
            <?php $albumYearName = '無年份'?>
        <?php endif; ?>
        <?php echo $this->hyperLink('album#' . $albumYearName, $albumYearName)?>
    </span>
    <span>»</span>
    <span id="albumName">
        <?php echo $this->escape($this->album['albumData']['albumName']) ?>
    </span>
</div>

<div id="infoBlock">
    <span id="infoNav" class="adminNav">
        <?php if ($this->isUploadPhotos): ?>
            <span id="uploadPhotos">
                <?php echo $this->hyperLink('album/add/photo/albumId/' . $this->album['albumData']['albumId'], '上傳相片»') ?>
            </span>
        <?php endif; ?>
            
        <?php if ($this->isEditAlbum): ?>
            |
            <span id="editAlbum">
                <?php echo $this->hyperLink('album/edit/index/id/' . $this->album['albumData']['albumId'], '編輯相簿資訊') ?>
            </span>
        <?php endif; ?>
            
        <?php if ($this->isDeleteAlbum): ?>
            |
            <span id="deleteAlbum">
                <?php echo $this->hyperLink('album/delete/index/id/' . $this->album['albumData']['albumId'], '刪除相簿', array('class' => 'deleteAction')) ?>
            </span>
        <?php endif; ?>
    </span>
    <span id="createDate"><?php echo $this->album['albumData']['createDate'] ?></span>
    ,&nbsp;
    <span id="photoCounts"><?php echo '共' . count($this->album['photos']) . '張相片' ?></span>
    <?php if ($this->message): ?>
        <small>|</small>
        <?php echo '<span style="width: 9em; color:red; padding:2px;">' . $this->message . '</span>' ?>
    <?php endif; ?>
</div>

<div id="photoContainer">
    <?php if ($this->album['photos']): ?>
        <?php foreach ($this->album['photos'] as &$photo): ?>
        <div class="photoBlock">
            <div class="photo">
                <a href="<?php echo BASE_URL . 'album/view/photo/id/' . $photo['photoId']?>">
                    <?php echo $this->photo(str_replace('.', '_thumb.', $photo['photoHashFile']), '相片：' . $photo['fileName']) ?>
                </a>

                <p class="photoDescription">
                    <?php if ($photo['photoDescription']): ?>
                        <?php echo $this->restrictString($this->escape($photo['photoDescription']), 18) ?>
                    <?php else: ?>
                        &nbsp;
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>此相簿無任何相片</h2>
    <?php endif; ?>
</div>