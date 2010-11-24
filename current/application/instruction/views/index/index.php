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
<?php $this->headTitle('學校簡介') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'history.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle1.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/navBar.css') ?>

<div id="navBar">
    目前位置：
    <span id="selected">學校簡介</span>
    <small>|</small>
    <?php echo $this->hyperLink('instruction/traffic', '交通資訊')?>
    <small>|</small>
    <?php echo $this->hyperLink('instruction/traffic', '校歌')?>
</div>

<h1>學校簡介</h1>

<p>澳底國小位於貢寮鄉濱海公路上，鄰近澳底漁港。創立於民國二年，隨著社會繁榮而日益進步，學生家長的職業由絕大多數的捕魚工作發展至今到農、漁、工、商兼具，儼然為社會的中堅。澳底的孩子生活在依山傍水，風景秀麗的東北角觀光據點上，展現出被自然洗禮的純真笑靨。</p>
<p>本校校址離縣府板橋約七十五公里，雖為一般學校，實為屬偏遠。舟車來往辛勞，故在硬體設備上，因交通的不易，而有所缺憾。除了國小部之外，另設有有幼稚園，以及自然、音樂、美勞等專科教室及圖書室、資源教室、電腦教室等，皆可依課程需要充分利用。</p>
<p>因學校地處偏遠，教師大多住校，除校長宿舍外，另有單身宿舍兩棟，平時教師以校為家，相互照顧，為校務發展發揮群策群力的功效。</p>
<p>教育工作是項希望工程，也是建築靈魂的事業，澳底國小的教職員在此共識下，努力創造澳底孩童亮麗的明天，也慶幸本地的孩子，有關心教育的父母，提供學校適時的幫助，讓澳底的孩童在無憂無慮下，快樂學習。</p>

<table summary="校史" class="tableStyle1">
    <tr>
        <th colspan="2">
            校史沿革
        </th>
    </tr>
    <tr>
        <td>民國2年4月1日</td>
        <td>創立頂雙溪公學校澳底分校</td>
    </tr>
    <tr>
        <td>民國10年4月</td>
        <td>改稱為澳底分教場</td>
    </tr>
    <tr>
        <td>民國12年3月</td>
        <td>改稱為澳底公學校</td>
    </tr>
    <tr>
        <td>民國30年4月</td>
        <td>改稱為澳底國民學校</td>
    </tr>
    <tr>
        <td>民國57年8月</td>
        <td>改稱澳底國民小學至今</td>
    </tr>
</table>