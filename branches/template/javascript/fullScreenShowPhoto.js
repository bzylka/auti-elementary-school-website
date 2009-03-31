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
function showDialog() {
    $("#photoFullScreen").dialog({
        show: 'slow',
        hide: 'slow',
        modal: true,
        overlay: {
            opacity: 0.5,
            background: "black"
        },
        draggable: false,
        resizable: false,
        width: 960,
        height: 720
    });

    $("#photoFullScreen").css({
        "display"      : "block"
    });
};