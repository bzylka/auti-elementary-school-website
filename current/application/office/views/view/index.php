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
<?php $this->headTitle($this->officeData['officeName']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'officeView.css') ?>

<h1><?php echo $this->escape($this->officeData['officeName']) . '&nbsp;│&nbsp;' . $this->escape($this->officeData['officeEnglishName'])?></h1>
<?php
if ($this->officeData['officeLink']) {
    echo '<a class="external" href="' . $this->officeData['officeLink'] . '" target="_blank">' . $this->escape($this->officeData['officeName']) . '網站</a>';
}
?>

<div id="officeContainer">
    <?php foreach ($this->officeData['title'] as &$title): ?>
        <?php foreach ($title['user'] as &$user): ?>
            <div class="userBlock">
                <div class="photo">
                    <?php echo $this->userPhoto($user['userId']) ?>
                </div>
                <div class="titleName">
                    <div class="userTitle">
                        <?php echo $this->escape($title['titleName']) ?>
                    </div>
                    <div class="userTitleEnglishName">
                        <?php echo $this->escape($title['titleEnglishName'])?>
                    </div>
                    <div class="userName">
                        <?php echo $this->escape($user['userName']) ?>
                    </div>
                </div>
                <div class="duty">
                    <?php echo $this->textareaToList($title['duty']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>