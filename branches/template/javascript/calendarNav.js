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
 * 行事曆的操作
 */
$(function() {
    // 高亮度標記事件
    $('.event').hover(
        function() {
            $(this).toggleClass("highlight");
            var eventTitle = $(this).attr('title');
            originBackgroundColor = $("td[title='" + eventTitle + "']").css('background-color');
            $("td[title='" + eventTitle + "']").css('background-color' , '#F07F00');
        },
        function() {
            $(this).toggleClass("highlight");
            var eventTitle = $(this).attr('title');
            $("td[title='" + eventTitle + "']").css('background-color' , originBackgroundColor);
        }
    );
    
    // 將所有事件細節用Detail包裝起來
    $('.event').children('.detail').dialog({autoOpen: false});
    
    // 標示節日（測試程式碼）
    $('tr').find("td:contains('09-01')").css('color', 'red');
    $('tr').find("td:contains('09-01')").prepend('YA，今天放假！');
    
    //高亮度標記日期格子（需要測試）
    $('.eventRow td').hover (
        function() {
            var tdIndex = $('.eventRow td').index(this);
            var row     = parseInt(tdIndex / 35);
            var col     = tdIndex % 7;
            
            for (i =0; i < 5; i++) {
                $('.eventRow td').eq(35 * row + i * 7 + col).toggleClass("highlight");
                $('.calendarSpace td').eq(35 * row + i * 7 + col).toggleClass("highlight");
            }
        },
        function() {
            var tdIndex = $('.eventRow td').index(this);
            var row     = parseInt(tdIndex / 35);
            var col     = tdIndex % 7;

            for (i =0; i < 5; i++) {
                $('.eventRow td').eq(35 * row + i * 7 + col).toggleClass("highlight");
                $('.calendarSpace td').eq(35 * row + i * 7 + col).toggleClass("highlight");
            }
        }
    );
});

/**
 * 顯示行事曆細節
 */
function showDetail(detailId)
{
    $('#' + detailId).dialog('open');
}
