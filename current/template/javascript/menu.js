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
 * 首頁選單操作
 */
$(function() {
    // 滑鼠選單操作
    $("#menu>li").hover(
        function(){
            $(this).children("ul").show();
            $(this).children("ul").css({"left": $(this).width() + 5 + "px", "top": $(this).position().top + "px"});
        }, function(){
            $(this).children("ul").hide();
        }
    );
    
    // 鍵盤選單操作
    $("#menu>li>a").focus(
        function(){
            $(this).parent("li").children("ul").show();
            $(this).parent("li").children("ul").css({"left": $(this).width() + 5 + "px", "top": $(this).position().top + "px"});
        }
    );

    $("#menu>li>ul>li:last-child>a").blur(
        function(){
            $("#menu>li>ul").hide();
        }
    );
    
    // 鍵盤選單操作效果
    $("#menu a").focus(
        function(){
            $(this).css("fontWeight", "bold");
        }
    );
    
    $("#menu a").blur(
        function(){
            $(this).css("fontWeight", "normal");
        }
    );
});