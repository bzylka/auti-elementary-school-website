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
 * 首頁選單操作
 */
$(function() {
    $('#menu>li').hover(
        function(){
            $(this).children('ul').show();
            $(this).children('ul').css({"left": $(this).width() + 5 + "px", "top": $(this).position().top + "px"});
        }, function(){
            $(this).children('ul').hide();
        })
});
