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
include ROOT_DIR . 'template/layouts/components/cssAdmin.php';
include ROOT_DIR . 'template/layouts/components/javascriptDefault.php';
include ROOT_DIR . 'template/layouts/components/headTitle.php';
?>

<?php echo $this->doctype('XHTML1_TRANSITIONAL') ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        <?php echo $this->headScript() ?>
        <?php echo $this->headTitle() ?>
    </head>
    
    <body>
         <div id="loginNav">
            <?php echo $this->partial('./components/loginNav.php') ?>
        </div>
        <div id="pageWraper">
            <div id="header">
                <div id="banner">
                    <?php echo $this->partial('./components/banner.php') ?>
                </div>
            </div>
            <div id="adminNav">
                <?php echo $this->partial('./components/adminNav.php') ?>
            </div>
            <div id="pageContent">
                <?php echo $this->layout()->content ?>
            </div>
            <div id="space">
                &nbsp;
            </div>
            <div id="footer">
                <?php echo $this->partial('./components/footer.php') ?>
            </div>
        </div>
    </body>
</html>
