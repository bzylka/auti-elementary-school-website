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
 * 全螢幕顯示圖片
 */
$(function() {
    $("a#showLargePhoto").fancybox({
        "overlayShow": true,
        "overlayOpacity": 0.5,
        "width": screen.width * 0.7,
        "height": screen.width * 0.7 * 0.75,
        "autoDimensions": false
    });
});