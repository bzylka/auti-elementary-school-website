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
<?php $userInfo = Zend_Auth::getInstance()->getIdentity() ?>
<div id="loginNav" class="grid_24">
    <form action="http://www.google.com/cse" id="cse-search-box">
        <div id="googleSearch">
            <input type="hidden" name="cx" value="005828894808706215757:lumwwvoaqvu" />
            <input type="hidden" name="ie" value="UTF-8" />
            <input id="googleSearchText" type="text" name="q" size="22" />
            <input type="submit" name="sa" value="搜尋網站" />
        </div>
    </form>

    <ul>
        <?php if ($this->layout()->getView()->loginMessage): ?>
            <li>
                <?php echo $this->layout()->getView()->messageBlock($this->layout()->getView()->loginMessage) ?>
            </li>
            <li>&nbsp;|</li>
        <?php endif; ?>
        <?php if ($userInfo): ?>
            <?php if ($userInfo->privilegeName == '管理者'): ?>
                <li><?php echo $this->hyperLink('admin', '進入管理介面')?>&nbsp;|</li>
            <?php endif; ?>

            <?php if ($userInfo->titleId): ?>
                <li><?php echo $this->hyperLink('title/duty/edit/id/' . $userInfo->titleId, '修改職掌') ?>&nbsp;|</li>
            <?php endif; ?>

            <li><?php echo $this->hyperLink('user/edit/index/id/' . $userInfo->userId, '修改個人資料') ?>&nbsp;|</li>

            <?php if ($userInfo->officeName): ?>
                <li><?php echo $userInfo->officeName ?>&nbsp;|</li>
            <?php endif; ?>

            <?php if ($userInfo->titleName): ?>
                <li><?php echo $userInfo->titleName ?>&nbsp;|</li>
            <?php endif; ?>

            <li id="loginUserName"><?php echo $userInfo->userName ?></li>
            <li>|&nbsp;身份：<?php echo $userInfo->privilegeName ?>&nbsp;|</li>
            <li><?php echo $this->hyperLink('logout', '登出')?></li>
        <?php else: ?>
            <li><?php echo $this->hyperLink('login', '登入')?></li>
        <?php endif; ?>
    </ul>
</div>