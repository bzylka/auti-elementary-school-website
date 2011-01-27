/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2011 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * 偵測密碼輸入時是否按了大寫鍵（CapsLock）
 */
$(function() {
    // 建立錯誤訊息
    $("input[type='password']").parent().append('<div id="capsLockAlert" style="color:red; margin:3px 0; display:none;">請取消大寫鍵〔CapsLock〕</div>');
    
    $("input[type='password']").keypress(function(event) {
        keyCode      = event.which;
        isShiftPress = event.shiftKey;
        
        // 偵測邏輯說明：
        // (keyCode >= 65 && keyCode <= 90) && !isShiftPress ------> 沒按下Shift鍵，但是打出大寫
        // (keyCode >= 97 && keyCode <= 122) && isShiftPress ------> 按下了Shift鍵，但是打出小寫
        if (((keyCode >= 65 && keyCode <= 90) && !isShiftPress) || ((keyCode >= 97 && keyCode <= 122) && isShiftPress)) {
            $("#capsLockAlert").show();
        } else {
            $("#capsLockAlert").hide();
        }
    });
});