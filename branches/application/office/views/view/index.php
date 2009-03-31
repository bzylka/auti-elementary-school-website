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
<?php foreach ($this->officeData['title'] as &$title): ?>
    <div class="titleBlock">
    <h2><?php echo $this->escape($title['titleName'])  . '&nbsp;│&nbsp;' . $this->escape($title['titleEnglishName']); ?></h2>
    <?php foreach ($title['user'] as &$user): ?>
        <div class="userBlock">
            <?php echo $this->escape($user['userName']) ?>
        </div>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>