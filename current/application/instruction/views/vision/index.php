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
<?php $this->headTitle('願景') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'vision.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/navBar.css') ?>

<?php echo $this->partial('navBar.php', array('page' => 'vision'))?>

<h1>願景</h1>

<ul id="vision">
    <li><strong>質樸</strong>&nbsp;-&nbsp;能瞭解自己</li>
    <li><strong>靈秀</strong>&nbsp;-&nbsp;會主動學習</li>
    <li><strong>矯健</strong>&nbsp;-&nbsp;能手腦並用</li>
    <li><strong>和諧</strong>&nbsp;-&nbsp;會尊重他人</li>
</ul>