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
<?php $this->headTitle('校歌、校徽') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'symbol.css') ?>
<h1>校歌</h1>
    <br />
    <p>
        <audio src="<?php echo BASE_URL ?>template/media/SchoolSong.ogg" controls autobuffer>
            <object type="application/x-java-applet" width="320" height="15">
                <param name="archive" value="http://<?php echo $_SERVER['HTTP_HOST'] . BASE_URL ?>template/media/cortado.jar" />
                <param name="code" value="com.fluendo.player.Cortado.class" />
                <param name="url" value="/template/media/SchoolSong.ogg" />
                <param name="seekable" value="false" />
                <param name="autoPlay" value="false" />
                <param name="showStatus" value="show" />
                <p>若無法播放，請使用
                    <img src="/template/img/browserLogo/firefox.png" title="Firefox" alt="Firefox" /><a href="http://moztw.org/">Firefox</a>
                    /
                    <img src="/template/img/browserLogo/googleChrome.png" title="GoogleChrome" alt="GoogleChrome" /><a href="http://www.google.com/chrome">Google Chrome</a>
                    瀏覽器，或安裝<a href="http://www.java.com/zh_TW/">Java</a>。
                </p>
            </object>
        </audio>
    </p>
    <p>（前奏）海天闊，雲飛揚，偉哉我校，位於澳底港，面對太平洋。</p>
    <p>群育列屏障，美麗堂皇，海產無限量，培植第二代，為國育棟樑，澳底澳底國家之光～</p>
    <br />
    <p>（重複）春風暖，教澤長，美哉我校，進步日無疆，品德日淬勵。</p>
    <p>五育重健康，志氣高昂，為國爭光榮，光陰莫蹉跎，自勉更自強，澳底澳底國家之光～</p>

<h1>校徽</h1>
