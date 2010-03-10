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
// 設定本樣板會用到的資訊
include ROOT_DIR . 'template/layouts/components/headMeta.php';
include ROOT_DIR . 'template/layouts/components/cssDefault.php';
include ROOT_DIR . 'template/layouts/components/javascriptDefault.php';
include ROOT_DIR . 'template/layouts/components/headTitle.php';
?>

<?php echo $this->doctype('XHTML1_TRANSITIONAL') ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        
        <?php echo $this->headTitle() ?>
    </head>
    
    <body>
        <div id="loginNav" class="container_24">
            <?php echo $this->partial('./components/loginNav.php') ?>
        </div>
        <div id="pageWraper" class="container_24">
            <div id="header">
                <div id="banner">
                    <?php echo $this->partial('./components/banner.php') ?>
                </div>
            </div>
            <div id="nav" class="grid_3">
                <?php echo $this->partial('./components/defaultNav.php') ?>
                <?php echo $this->partial('./components/webLink.php') ?>
            </div>
            <div id="pageContent" class="grid_20">
                <?php echo $this->layout()->content ?>
            </div>
            <div id="space">
                &nbsp;
            </div>
            <div id="footer">
                <?php echo $this->partial('./components/footer.php') ?>
            </div>
        </div>
        <?php echo $this->headScript() ?>
        <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8577883-1");
pageTracker._trackPageview();
} catch(err) {}
</script>
    </body>
</html>
