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
$(document).ready(function(input){
    if (screen.width >= 800 && screen.width < 1024) {
        bodyFontSize = "16px";
    } else if (screen.width >= 1024 && screen.width < 1280) {
        bodyFontSize = "17px";
    } else if (screen.width >= 1280) {
        bodyFontSize = "20px";
    }
    
    $("body").css({fontSize: bodyFontSize});
});
