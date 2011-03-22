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
        <div id="pageWraper" class="container_24">

            <?php echo $this->partial('./components/loginNav.php') ?>
            
            <div class="clear"></div>
            
            <?php echo $this->partial('./components/header.php') ?>
                
            <div class="clear"></div>
            
            <div id="nav" class="grid_3">
                <?php echo $this->partial('./components/defaultNav.php') ?>
                <?php echo $this->partial('./components/webLink.php') ?>
            </div>
            
            <div id="pageContent" class="grid_20">
                <div id="anchor"><a title="主要內容區" href="#content" accesskey="C">:::</a></div>
                <?php echo $this->layout()->content ?>
            </div>
            
            <div class="clear"></div>
        </div>
        
        <?php echo $this->partial('./components/footer.php') ?>
        
        <?php echo $this->headScript() ?>
        
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8577883-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
        <noscript>
            您的瀏覽器不支援Javascript，但是並不會影響到網頁的閱讀
        </noscript>
    </body>
</html>
