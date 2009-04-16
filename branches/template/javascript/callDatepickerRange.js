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
 * 呼叫Datepicker，限定範圍
 */
$(function() {
    $('.startDate').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true
    });

    $('.endDate').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        minDate: new Date(2009, 1 - 1, 1)
    });
    
    $('.startDate').change(function() {
         var dateArray = $('.startDate').val().split('-');
         $('.endDate').datepicker('option', 'minDate', new Date(dateArray[0], dateArray[1] - 1, dateArray[2]));
    });
    
    $('.endDate').change(function() {
         var dateArray = $('.endDate').val().split('-');
         $('.startDate').datepicker('option', 'maxDate', new Date(dateArray[0], dateArray[1] - 1, dateArray[2]));
    });
});