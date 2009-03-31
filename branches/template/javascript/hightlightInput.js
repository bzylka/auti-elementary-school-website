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

/**
 * 將所有的輸入區域加上明顯的標示
 */
function highlight(input)
{
    this.style.backgroundColor = '#ffff99';
}

function dehighlight(input)
{
    this.style.backgroundColor = '';
}

$(document).ready(function(input){
    $("input[type='text'], input[type='password']").focus(highlight);
    $("input[type='text'], input[type='password']").blur(dehighlight);
});
