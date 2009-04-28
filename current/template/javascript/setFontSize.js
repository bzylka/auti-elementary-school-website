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
 * 設定字型
 */
$(function() {
    if (screen.width >= 800 && screen.width < 1024) {
        $('body').css('fontSize', '16px');
    } else if (screen.width >= 1024 && screen.width < 1280) {
        //不設定，由CSS決定
    } else if (screen.width >= 1280) {
        $('body').css('fontSize', '20px');
    }
});
