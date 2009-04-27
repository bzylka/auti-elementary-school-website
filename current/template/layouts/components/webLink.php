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
<?php
// 讀取網路連結列表
$webLink = new Model_WebLink(array('setNoForm' => true));
$webLinkList = $webLink->getWebLinks(5);
unset($webLink);
?>
<br />
<h1>網路連結</h1>
<ul id="webLink">
    <?php foreach ($webLinkList as &$webLink): ?>
        <li>
            <a href="<?php echo $webLink['link'] ?>">
                <?php echo $this->layout()->getView()->img('photos/' . $webLink['iconHashFile'], $webLink['linkName']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
        
