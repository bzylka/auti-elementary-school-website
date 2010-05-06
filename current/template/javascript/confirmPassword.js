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
 * 確認密碼輸入是否相同
 */
$(function() {
    $("form").submit(
        function()
        {
            if ($("#password").val() != $("#confirmPassword").val()) {
                alert("確認密碼和密碼不同，請重新輸入");
                $("#password").select();
                return false;
            }
            
            return true;
        }
    );
});
