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
<?php $this->headTitle('交通資訊') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'traffic.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/navBar.css') ?>

<div id="navBar">
    目前位置：
    <?php echo $this->hyperLink('instruction', '學校簡介')?>
    <small>|</small>
    <span id="selected">交通資訊</span>
    <small>|</small>
    <?php echo $this->hyperLink('instruction/schoolSong', '校歌')?>
</div>

<h1>交通資訊</h1>

<ul style="line-height:1.2em;">
    <li>火車：於福隆火車站下車，再轉搭基隆客運</li>
    <li>客運：搭乘基隆客運（基隆─福隆）、國光客運（台北─宜蘭羅東線），到澳底站下車</li>
    <li>開車：從八堵交流道或基隆出口，轉接（台2省）濱海公路。</li>
</ul>

<div id="googleMap">
    <iframe title="澳底地圖" width="770" height="585" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.tw/maps?q=%E6%BE%B3%E5%BA%95%E5%9C%8B%E5%B0%8F&amp;ie=UTF8&amp;brcurrent=3,0x345d5ce8e584c6dd:0x9103200a1e847910&amp;sll=25.05488,121.92504&amp;sspn=0.006295,0.006295&amp;s=AARTsJrzK-jC-7fdwQkY5amoUsi6savfgw&amp;ll=25.052363,121.922278&amp;spn=0.018661,0.027466&amp;z=15&amp;output=embed">
    </iframe>
    <br />
    <div style="margin-top:5px; text-align:right;">
        <a class="external" href="http://maps.google.com.tw/maps?q=%E6%BE%B3%E5%BA%95%E5%9C%8B%E5%B0%8F&amp;ie=UTF8&amp;brcurrent=3,0x345d5ce8e584c6dd:0x9103200a1e847910&amp;sll=25.05488,121.92504&amp;sspn=0.006295,0.006295&amp;ll=25.052363,121.922278&amp;spn=0.018661,0.027466&amp;z=15&amp;source=embed" style="color:#0000FF;text-align:left" target="blank">
            在Google 地圖上查看
        </a>
    </div>
</div>