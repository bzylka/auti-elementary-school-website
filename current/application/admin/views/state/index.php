<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */
?>
<?php $this->headTitle('管理介面')->headTitle('系統狀態檢查') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle5.css') ?>

<h1>系統狀態檢查</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->stateMessage): ?>
    <div id="stateMessage">
        <table summary="系統狀態" class="tableStyle5">
            <tr>
                <th class="key">檢查項目</th>
                <th class="currentSetting">目前設定</th>
                <th class="titleEnglishName">結果</th>
            </tr>
            <?php foreach ($this->stateMessage as &$state): ?>
                <tr>
                    <td class="key"><?php echo $state['key'] ?></td>
                    <td class="currentSetting"><?php echo $state['currentSetting'] ?></td>
                    <td class="isValid">
                        <?php if ($state['isValid'] == true): ?>
                            通過
                        <?php elseif ($state['suggestion'] == true): ?>
                            <span style="color:#0066CC; font-weight:bold;">不通過，建議修改<span>
                        <?php else: ?>
                            <span style="color:red; font-weight:bold;">不通過，請務必修改<span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>