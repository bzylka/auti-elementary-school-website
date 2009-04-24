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
 * 讀取首頁行事曆區塊
 */
function getCalendarBlock(date, moveDirection)
{
    // 設定讀取訊息
    $('#calendarMessage').html('讀取中…');
    $('#calendarMessage').css('display', 'block');
    
    // 讀取行事曆
    $.ajax({
        url: 'calendar/ajax/getDefaultCalendar/date/' + date,
        error: function(exception) {
            $('#calendarMessage').html('發生錯誤，讀取行事曆，請稍後再試');
        },
        success: function(response) {
            // 設定消失方向（反向）
            if (moveDirection == 'left') {
                var hideDirection = 'right';
            } else if (moveDirection == 'down') {
                var hideDirection = 'up';
            } else {
                var hideDirection = 'left';
            }
            
            // 檢查是否已經有行事曆，如果有則啟動消失動作
            if ($('#calendar .blockContent').html().length > 10) {
                $('#calendar .blockContent').hide('slide', { direction: hideDirection }, 450);
                var isSlide = true;
            } else {
                $('#calendar .blockContent').css('display', 'none');
            }

            // 寫入內容，顯示動作
            $('#calendar .blockContent').html(response);
            $('#calendarMessage').fadeOut(600);
            if (isSlide == true) {
                $('#calendar .blockContent').show('slide', { direction: moveDirection }, 450);
            } else {
                $('#calendar .blockContent').fadeIn(200);
            }
            
            // 讀取節日列表
            $('#festivalMessage').html('讀取本月節日中…');
            $.ajax({
                url: 'calendar/ajax/getFestival/date/' + date,
                error: function(exception) {
                    $('#festivalMessage').html('無法讀取Google上的節日清單');
                },
                success: function(response) {
                    // 寫入內容，顯示動作
                    $('#festivalList').css('display', 'none');
                    $('#festivalList').html(response);
                    $('#festivalMessage').fadeOut(500);
                    $('#festivalList').fadeIn(400);
                }
            });
        }
    });
}

/**
 * 讀取預設行事曆
 */
$(function() {
    getCalendarBlock('', 'left');
});