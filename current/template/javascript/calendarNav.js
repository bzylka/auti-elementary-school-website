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
 * 行事曆的操作
 */
$(function() {
    // 高亮度標記事件
    $(".event").hover(
        function() {
            var eventTitle = $(this).attr("title");
            $("td[title='" + eventTitle + "']").toggleClass("eventHighlight");
        },
        function() {
            var eventTitle = $(this).attr("title");
            $("td[title='" + eventTitle + "']").toggleClass("eventHighlight");
        }
    );
    
    // 將所有事件細節用Detail包裝起來
    $(".event").children(".detail").dialog({
        autoOpen: false,
        hide: "scale",
        show: "scale"
    });

    // 標示今天
    $("td[title='" + $("#calendarNav").attr("title") + "']").append("<div class=\"today\">《今天》</div>");
    
    // 標示節日
    $.ajax({
        url: "../../../ajax/getFestival/date/" + $("#calendar").attr("title"),
        dataType: "json",
        success: function(response) {
            $.each(response, function(i, festival){
                if ($("td[title='" + festival.date + "']").html().length < 80) {
                    $("td[title='" + festival.date + "']").append("<div class=\"festival\">" + festival.title + "</div>");
                } else {
                    $("td[title='" + festival.date + "'] .festival").append("<br />" + festival.title);
                }
            });
        }
    });
});

/**
 * 顯示行事曆細節
 */
function showDetail(detailId)
{
    $("#" + detailId).dialog("open");
}
