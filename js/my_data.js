/**
 * Created by nikolay on 1/5/15.
 */
$(function () {
    $.datepicker.setDefaults(
        $.extend($.datepicker.regional["ru"])
    );
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
});


$(function () {

    $("#date_left").datepicker({
        defaultDate: "",
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        showWeek: true,
        onClose: function (selectedDate) {
            $("#date_right").datepicker("option", "minDate", selectedDate);
        }

    });
    $("#date_right").datepicker({
        defaultDate: "",
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1,
        showWeek: true,
        onClose: function (selectedDate) {
            $("#date_left").datepicker("option", "maxDate", selectedDate);
        }

    });

});