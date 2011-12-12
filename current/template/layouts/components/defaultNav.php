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
<h1><a title="選單" href="#menu" accesskey="M">:::</a>&nbsp;網站選單</h1>
<ul id="menu">
    <li><a href="<?php echo BASE_URL . 'news' ?>"><?php echo $this->img('icon/news.png', '*') ?>最新消息</a></li>
    <li><a href="<?php echo BASE_URL . 'news/important' ?>"><?php echo $this->img('icon/important.png', '*') ?>近期重要公告</a></li>
    <li><a href="<?php echo BASE_URL . 'sitemap' ?>"><?php echo $this->img('icon/sitemap.png', '*') ?>網站導覽</a></li>
    <li class="parentMenuItem"><a href="#instruction"><?php echo $this->img('icon/instruction.png', '*') ?>學校簡介&nbsp;&raquo;</a>
        <ul>
            <li><?php echo $this->hyperLink('instruction', '學校簡介')?></li>
            <li><?php echo $this->hyperLink('instruction/vision', '願景')?></li>
            <li><?php echo $this->hyperLink('instruction/traffic', '交通資訊')?></li>
            <li><?php echo $this->hyperLink('instruction/schoolSong', '校歌')?></li>
		</ul>
    </li>
    <li class="parentMenuItem"><a href="#organization"><?php echo $this->img('icon/office.png', '*') ?>行政組織&nbsp;&raquo;</a>
        <ul>
            <?php foreach ($officeList as $office): ?>
                <li><?php echo $this->hyperLink('office/view/index/id/' . $office['officeId'], $office['officeName'])?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><a href="<?php echo BASE_URL . 'team'?>"><?php echo $this->img('icon/team.png', '*') ?>教師團隊</a></li>
    <li class="parentMenuItem"><a href="#classWeb"><?php echo $this->img('icon/classWeb.png', '*') ?>班級網頁&nbsp;&raquo;</a>
        <ul>
            <?php foreach ($classList as $class): ?>
                <?php if ($class->classWebsite): ?>
                    <li><a class="external" href="<?php echo str_replace('&', '&amp;', $class->classWebsite) ?>" target="_blank"><?php echo $this->escape($class->className) ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
		</ul>
    </li>
    <li><a href="<?php echo BASE_URL . 'album'?>"><?php echo $this->img('icon/album.png', '*') ?>相簿</a></li>
    <li><a href="<?php echo BASE_URL . 'calendar/view'?>"><?php echo $this->img('icon/calendar.png', '*') ?>行事曆</a></li>
    <li><a href="<?php echo 'http://paauti.blogspot.com/'?>"><?php echo $this->img('icon/parentsAssociationOffice.png', '*') ?>家長會</a></li>
    <li><a href="<?php echo 'http://tw.class.uschoolnet.com/class/?csid=css000000046904'?>"><?php echo $this->img('icon/volunteer.png', '*') ?>志工隊</a></li>
    <li><a href="<?php echo 'http://autisandiaoliondance.blogspot.com/' ?>"><?php echo $this->img('icon/sandiaoLionDance.png', '*') ?>三貂獅</a></li>
    <li><a href="<?php echo BASE_URL . 'websites/Doc' ?>"><?php echo $this->img('icon/doc.png', '*') ?>數位機會中心</a></li>
    <?php foreach ($achievementList as $achievement): ?>
        <li>
            <a href="<?php echo BASE_URL . 'achievement/index/index/id/' . $achievement['achievementId']?>">
                <?php echo $this->img('icon/achievement.png', '*') ?><?php echo $this->escape($achievement['achievementName']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
