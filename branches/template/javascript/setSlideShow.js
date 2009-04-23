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
 * 設定相簿隨機顯示的AJAX
 */
$(function() {
    $("input[type='checkbox']").click(function(){
        if ($(this).attr("checked") == true) {
            var isShow = "1";
        } else {
            var isShow = "0";
        }
        
        $.ajax({
            url: 'slideShow/set/id/' + $(this).attr("name") + '/isShow/' + isShow,
            error: function(exception) {
                alert('發生錯誤，可能網站無法運作，請重新整理');
            },
            success: function(response) {
                alert(response);
            }
        });
    });
});
