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
<h1>網站導覽</h1>
<ul id="menu">
    <li><a href="<?php echo BASE_URL . 'news'?>"><?php echo $this->img('icon/news.png', '最新消息') ?>最新消息</a></li>
    <li><a href="<?php echo BASE_URL . 'news/important'?>"><?php echo $this->img('icon/important.png', '近期重要公告') ?>近期重要公告</a></li>
    <li class="parentMenuItem"><?php echo $this->img('icon/instruction.png', '學校簡介') ?>學校簡介&nbsp;&raquo;
        <ul>
            <li><?php echo $this->hyperLink('instruction', '學校簡介')?></li>
            <li><?php echo $this->hyperLink('instruction/traffic', '交通資訊')?></li>
            <li><?php echo $this->hyperLink('instruction/schoolSong', '校歌')?></li>
		</ul>
    </li>
    <li class="parentMenuItem"><?php echo $this->img('icon/office.png', '行政組織') ?>行政組織&nbsp;&raquo;
        <ul>
            <?php foreach ($officeList as $office): ?>
                <li><?php echo $this->hyperLink('office/view/index/id/' . $office['officeId'], $office['officeName'])?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><a href="<?php echo BASE_URL . 'team'?>"><?php echo $this->img('icon/team.png', '教師團隊') ?>教師團隊</a></li>
    <li class="parentMenuItem"><?php echo $this->img('icon/classWeb.png', '班級網頁') ?>班級網頁&nbsp;&raquo;
        <ul>
            <?php foreach ($classList as $class): ?>
                <?php if ($class->classWebsite): ?>
                    <li><a class="external" href="<?php echo $class->classWebsite ?>" target="_blank"><?php echo $this->escape($class->className) ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
		</ul>
    </li>
    <li><a href="http://www.nhcue.edu.tw/~u9115043/AutiDoc/"><?php echo $this->img('icon/doc.png', '數位機會中心') ?>數位機會中心</a></li>
    <li><a href="<?php echo BASE_URL . 'album'?>"><?php echo $this->img('icon/album.png', '相簿') ?>相簿</a></li>
    <li><a href="<?php echo BASE_URL . 'calendar/view'?>"><?php echo $this->img('icon/calendar.png', '行事曆') ?>行事曆</a></li>
    <?php foreach ($achievementList as $achievement): ?>
        <li><a href="<?php echo BASE_URL . 'achievement/index/index/id/' . $achievement['achievementId']?>"><?php echo $this->img('icon/achievement.png', '學輔專區') ?><?php echo $this->escape($achievement['achievementName']) ?></a></li>
    <?php endforeach; ?>
</ul>
