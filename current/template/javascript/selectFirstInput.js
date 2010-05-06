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

/**
 * 自動移動到第一個輸入區域，並且高亮度標記focus的iuput
 */
$(function() {
    // 設定高亮度標記的顏色
    $("input[type='text'], input[type='password']").focus(function(){this.style.backgroundColor = "#ffff99";});
    $("input[type='text'], input[type='password']").blur(function(){this.style.backgroundColor = "";});
    
    // 自動移到第一個input
    $("input[type='text']:first").focus();
});
