function GetNepaliCurrentDate() {
    var selectedDate = NepaliFunctions.GetCurrentBsDate();
    var month = (selectedDate.month.toString().length == 2) ? selectedDate.month : '0' + selectedDate.month;
    var day = (selectedDate.day.toString().length == 2) ? selectedDate.day : '0' + selectedDate.day;
    var date = selectedDate.year + '-' + month + '-' + day;
    return date;
}
function NepaliDatePickerCal(date) {
    date.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: false,
        language: "english",
        disableAfter: GetNepaliCurrentDate(),
    });
}
var npDate = document.getElementsByClassName("establishment_date");
if (npDate.length > 0) {
    NepaliDatePickerCal(npDate);
}

/********************
 Helper Functions
 ********************/

 function random(min, max) {
    return Math.random() * (max - min) + min;
}