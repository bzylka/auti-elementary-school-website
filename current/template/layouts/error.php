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
            <?php echo $this->partial('./components/header.php') ?>

            <div class="clear"></div>
            
            <div id="pageContent" style="height:20em; text-align:center;" class="grid_24">
                <?php echo $this->layout()->content ?>
            </div>

            <div class="clear"></div>
        </div>
        
        <?php echo $this->partial('./components/footer.php') ?>
        <noscript>
            您的瀏覽器不支援Javascript，但是並不會影響到網頁的閱讀
        </noscript>
    </body>
</html>
