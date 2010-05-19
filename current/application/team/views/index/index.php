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
<?php $this->headTitle('教師團隊') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'teamIndex.css') ?>

<h1>教師團隊</h1>

<div id="teacherContainer">
    <?php foreach ($this->teamList as $member): ?>
        <div class="memberBlock">
            <div class="userPhoto"><?php echo $this->userPhoto($member['userId']) ?></div>
            <div class="text">
                <span class="userName"><?php echo $this->escape($member['userName']) ?></span>
                <br />
                <span class="titleName">
                <?php if ($member['titleName']): ?>
                    <?php echo $this->escape($member['titleName']) ?>
                <?php else: ?>
                    教師
                <?php endif; ?>
                </span>
            </div>
        </div>
    <?php endforeach; ?>
</div>