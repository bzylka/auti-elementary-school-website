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
<?php $this->headTitle('管理介面')->headTitle('使用者管理') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/form.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'components/tableStyle4.css') ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'adminUser.css') ?>

<h1>使用者管理</h1>

<?php if ($this->message): ?>
    <?php echo $this->messageBlock($this->message) ?>
<?php endif; ?>

<?php if ($this->userTable): ?>
    <div id="userTable">
        <table summary="使用者列表" class="tableStyle4">
            <tr>
                <th class="userName">姓名</th>
                <th class="title">職稱</th>
                <th class="privilegeName">權限</th>
                <th class="account">帳號</th>
                <th class="isLeader">主任/校長</th>
                <th class="edit">編輯</th>
                <th class="delete">刪除</th>
            </tr>
            <?php foreach ($this->userTable as &$user): ?>
                <tr>
                    <td class="userName"><?php echo $user['userName']?></td>
                    <td class="title"><?php echo $user['titleName'] ?></td>
                    <td class="privilegeName"><?php echo $user['privilegeName'] ?></td>
                    <td class="account"><?php echo $user['account'] ?></td>
                    <td class="isLeader"><?php if ($user['isLeader']): echo '&nbsp;&nbsp;ν';else: echo '&nbsp;'; endif; ?></td>
                    <td class="edit"><?php echo $this->hyperLinK('admin/user/edit/id/' . $user['userId'], '編輯') ?></td>
                    <td class="delete"><?php echo $this->hyperLinK('admin/user/delete/id/' . $user['userId'], '刪除') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<?php if ($this->userId): ?>
    <div id="userPhoto">
        <?php echo $this->userPhoto($this->userId) ?>
    </div>
<?php endif; ?>

<div class="formContainer">
    <?php echo $this->userForm ?>
</div>