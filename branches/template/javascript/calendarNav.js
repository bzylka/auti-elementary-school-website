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
        function () {
            var eventTitle = $(this).attr('title');
            originBackgroundColor = $("td[title='" + eventTitle + "']").css('background-color');
            $("td[title='" + eventTitle + "']").css('background-color' , '#F07F00');
        },
        function () {
            var eventTitle = $(this).attr('title');
            $("td[title='" + eventTitle + "']").css('background-color' , originBackgroundColor);
        }
    );
    
    // 將所有細節用Detail包裝起來
    $('.event').children('.detail').dialog({autoOpen: false});
    
});

/**
 * 顯示行事曆細節
 */
function showDetail(detailId)
{
    $('#' + detailId).dialog('open');
}
