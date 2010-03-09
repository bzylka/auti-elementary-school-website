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
<?php $this->headTitle('相簿') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'albumIndex.css') ?>

<?php if ($this->allowAlbum): ?>
    <?php echo $this->hyperLink('album/add', '新增相簿＋') ?>
<?php endif; ?>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->albums): ?>
    <div id="albumContainer">
    <?php foreach ($this->albums as $year => &$albums): ?>
        <h1 class="albumYear"><a name="<?php echo $this->escape($year) ?>"></a><?php echo $this->escape($year) ?></h1>
        <?php foreach ($albums as &$album): ?>
            <div class="albumBlock">
                <p class="albumCover">
                    <a href="<?php echo BASE_URL . 'album/view/index/id/' . $album['albumId']?>">
                        <?php if ($album['coverPhotoFile']): ?>
                            <?php echo $this->photo($album['coverPhotoFile'], $album['albumName']) ?>
                        <?php else: ?>
                            <?php echo $this->img('noCover.png', $album['albumName']) ?>
                        <?php endif; ?>
                    </a>
                </p>
                <p class="albumName"><?php echo $this->escape($album['albumName']) ?></p>
                <p class="createDate"><?php echo $this->escape($album['createDate']) ?>
                                      <?php if (Date::sub(Date::getDate(), $this->escape($album['createDate'])) < 30):?>
                                          <sup>New！</sup>
                                      <?php endif;?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <h1>目前沒有相簿</h2>
<?php endif; ?>