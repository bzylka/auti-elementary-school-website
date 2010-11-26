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
<?php $this->headTitle('網站導覽') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'sitemap.css') ?>

<h1>網站導覽</h1>

<div id="accesskey">
    本網站的無障礙快速鍵（Accesskey）設定如下：
    <ul>
        <li><span class="key">L</span>：上方登入區，進行登入操作。</li>
        <li><span class="key">M</span>：左方選單區，進行選單操作。</li>
        <li><span class="key">K</span>：左方連結區，進行連結操作。</li>
        <li><span class="key">C</span>：主要內容區。</li>
        <li><span class="key">I</span>：聯絡資訊區。</li>
    </ul>

    <div id="note">
        IE以及Google 瀏覽器的快速鍵請搭配
        <span class="key">Alt</span>
        使用。
        
        <br />
        <br />

        Firefox 的快速鍵請搭配
        <span class="key">Shift</span>
        +
        <span class="key">Alt</span>
        使用。
    </div>
</div>

<?php
// 讀取處室列表
$office = new Model_Office();
$officeList = $office->getOfficeList();
unset($office);

// 讀取班級列表
$class = new Model_Class();
$classList = $class->getClasses();
unset($class);

// 讀取成果專區
$achievement = new Model_Achievement();
$achievementList = $achievement->getAchievementList();
unset($achievement);
?>
<ul id="sitemap">
    <li><a href="<?php echo BASE_URL . 'news'?>">最新消息</a></li>
    <li><a href="<?php echo BASE_URL . 'news/important'?>">近期重要公告</a></li>
    <li><a href="<?php echo BASE_URL . 'sitemap'?>">網站導覽</a></li>
    <li class="parentMenuItem">學校簡介&nbsp;&raquo;
        <ul>
            <li><?php echo $this->hyperLink('instruction', '學校簡介')?></li>
            <li><?php echo $this->hyperLink('instruction/traffic', '交通資訊')?></li>
            <li><?php echo $this->hyperLink('instruction/schoolSong', '校歌')?></li>
		</ul>
    </li>
    <li class="parentMenuItem">行政組織&nbsp;&raquo;
        <ul>
            <?php foreach ($officeList as $office): ?>
                <li><?php echo $this->hyperLink('office/view/index/id/' . $office['officeId'], $office['officeName'])?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><a href="<?php echo BASE_URL . 'team'?>">教師團隊</a></li>
    <li class="parentMenuItem">班級網頁&nbsp;&raquo;
        <ul>
            <?php foreach ($classList as $class): ?>
                <?php if ($class->classWebsite): ?>
                    <li><a class="external" href="<?php echo $class->classWebsite ?>" target="_blank"><?php echo $this->escape($class->className) ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
		</ul>
    </li>
    <li><a href="http://www.nhcue.edu.tw/~u9115043/AutiDoc/">數位機會中心</a></li>
    <li><a href="<?php echo BASE_URL . 'album'?>">相簿</a></li>
    <li><a href="<?php echo BASE_URL . 'calendar/view'?>">行事曆</a></li>
    <?php foreach ($achievementList as $achievement): ?>
        <li><a href="<?php echo BASE_URL . 'achievement/index/index/id/' . $achievement['achievementId']?>"><?php echo $this->escape($achievement['achievementName']) ?></a></li>
    <?php endforeach; ?>
</ul>
