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

// 讀取成果專區
$achievement = new Model_Achievement();
$achievementList = $achievement->getAchievementList();
unset($achievement);
?>
<h1>網站導覽</h1>
<ul id="menu">
    <li><a href="<?php echo BASE_URL . 'news'?>"><?php echo $this->img('icon/news.png', '最新消息') ?>最新消息</a></li>
    <li><a href="<?php echo BASE_URL . 'news/important'?>"><?php echo $this->img('icon/important.png', '重要公告') ?>重要公告</a></li>
    <li class="parentMenuItem"><?php echo $this->img('icon/instruction.png', '學校簡介') ?>學校簡介&nbsp;&raquo;
        <ul>
            <li><?php echo $this->hyperLink('instruction', '學校簡介')?></li>
            <li><?php echo $this->hyperLink('instruction/traffic', '交通資訊')?></li>
            <li><?php echo $this->hyperLink('instruction/symbol', '校歌、校徽')?></li>
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
    <li class="parentMenuItem"><?php echo $this->img('icon/pta.png', '家長會') ?>家長會&nbsp;&raquo;
        <ul>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000080753" target="_blank">家長會</a></li>
            <li><a class="external" href="http://css000000046904.uclass.com.tw/" target="_blank">志工隊</a></li>
        </ul>
    </li>
    <li class="parentMenuItem"><?php echo $this->img('icon/classWeb.png', '班級網頁') ?>班級網頁&nbsp;&raquo;
        <ul>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000069012" target="_blank">一甲</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000072230" target="_blank">一乙</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071189" target="_blank">二甲</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071187" target="_blank">二乙</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071190" target="_blank">三甲</a></li>
            <li><a class="external" href="#">三乙（X）</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000042400" target="_blank">四甲</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000042404" target="_blank">四乙</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071481" target="_blank">五甲</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071482" target="_blank">五乙</a></li>
            <li><a class="external" href="http://tw.class.urlifelinks.com/class/?csid=css000000071489" target="_blank">六甲</a></li>
            <li><a class="external" href="#">六乙（X）</a></li>
		</ul>
    </li>
    <li><a href="http://www.nhcue.edu.tw/~u9115043/AutiDoc/"><?php echo $this->img('icon/doc.png', '數位機會中心') ?>數位機會中心</a></li>
    <li><a href="<?php echo BASE_URL . 'album'?>"><?php echo $this->img('icon/album.png', '相簿') ?>相簿</a></li>
    <li><a href="<?php echo BASE_URL . 'calendar/view'?>"><?php echo $this->img('icon/calendar.png', '行事曆') ?>行事曆</a></li>
    <?php foreach ($achievementList as $achievement): ?>
        <li><a href="<?php echo BASE_URL . 'achievement/index/index/id/' . $achievement['achievementId']?>"><?php echo $this->img('icon/achievement.png', '學輔專區') ?><?php echo $this->escape($achievement['achievementName']) ?></a></li>
    <?php endforeach; ?>
</ul>
