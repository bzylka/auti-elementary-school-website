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
            var eventTitle = $(this).attr('title');
            $("td[title='" + eventTitle + "']").toggleClass("eventHighlight");
        },
        function() {
            var eventTitle = $(this).attr('title');
            $("td[title='" + eventTitle + "']").toggleClass("eventHighlight");
        }
    );
    
    // 將所有事件細節用Detail包裝起來
    $('.event').children('.detail').dialog({autoOpen: false});
    
    // 標示節日（測試程式碼）
    $('tr').find("td:contains('04-23')").css('color', 'red');
    //$('tr').find("td:contains('04-23')").prepend('YA，今天放假！');
    
});

/**
 * 顯示行事曆細節
 */
function showDetail(detailId)
{
    $('#' + detailId).dialog('open');
}
