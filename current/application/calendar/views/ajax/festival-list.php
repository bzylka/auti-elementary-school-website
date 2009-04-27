<?php
/**
 * FreeLibrary圖書管理系統
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @category   View
 * @package    Script
 * @copyright  2008 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */
?>

<?php if ($this->message): ?>
    <?php echo $this->escape($this->message) ?>
<?php else: ?>
    <?php if (count($this->festivals) != 0): ?>
        <h1>本月節日</h1>
        <?php foreach ($this->festivals as &$festival): ?>
            <span class="festivalDate">
                <?php echo $festival['date'] ?>
            </span>
            &nbsp;
            <span class="festivalTitle">
                <?php echo $this->escape($festival['title']) ?>
            </span>
            <br />
        <?php endforeach;?>
    <?php else: ?>
        本月無節日
    <?php endif; ?>
<?php endif; ?>

