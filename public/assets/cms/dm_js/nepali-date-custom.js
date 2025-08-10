﻿////// Write by (Alok) JavaScript code .


//#region Nepali date piker 
function GetNepaliCurrentDate() {
    var selectedDate = NepaliFunctions.GetCurrentBsDate();
    var month = (selectedDate.month.toString().length === 2) ? selectedDate.month : '0' + selectedDate.month;
    var day = (selectedDate.day.toString().length === 2) ? selectedDate.day : '0' + selectedDate.day;
    var date = selectedDate.year + '-' + month + '-' + day;
    return date;
}

function GetADDate() {
    
    var selectedDate = NepaliFunctions.GetCurrentAdDate();
    var month = (selectedDate.month.toString().length == 2) ? selectedDate.month : '0' + selectedDate.month;
    var day = (selectedDate.day.toString().length == 2) ? selectedDate.day : '0' + selectedDate.day;
    var date = selectedDate.year + '-' + month + '-' + day;
    return date;
}

function GetNepaliDateFromEnglishDate(adYear = 1, adMonth, adDay) {
    if (parseInt(adYear) > 1800) {
        var selectedDate = NepaliFunctions.AD2BS({ year: adYear, month: adMonth, day: adDay });
        var month = (selectedDate.month.toString().length == 2) ? selectedDate.month : '0' + selectedDate.month;
        var day = (selectedDate.day.toString().length == 2) ? selectedDate.day : '0' + selectedDate.day;
        var date = selectedDate.year + '-' + month + '-' + day;
        return date;
    } else
        return GetNepaliCurrentDate();
}



function GetAdDateFromNepaliDate(nepaliDate) {
    if (nepaliDate.trim()) {
        var aa = nepaliDate.split('-');
        var selectedDate = NepaliFunctions.BS2AD({ year: aa[0], month: aa[1], day: aa[2] });
        var adDate = new Date(`${selectedDate.year}-${selectedDate.month}-${selectedDate.day}`);
        return adDate.toLocaleDateString('en-CA');
    }
}

function GetAgeFromNepaliDate(nepaliDate) {
    if (nepaliDate.trim()) {
        var aa = nepaliDate.split('-');
        var selectedDate = NepaliFunctions.BS2AD({ year: aa[0], month: aa[1], day: aa[2] });
        var now = NepaliFunctions.GetCurrentAdDate();
        var age = now.year - selectedDate.year;
        return age;
    }
}

function NepaliDatePickerCal(date) {
    var cDate = GetNepaliCurrentDate();
    date.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        disableAfter: cDate
    });
    date.value = date.value || cDate;
}

function NepaliDatePickerCalWithClass(date) {
    var cDate = GetNepaliCurrentDate();
    date.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        disableAfter: cDate,
    });
    date[0].value = cDate;
}

function NepaliDatePickerCalForPartialViewWithADDate(date) {
    date.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        onChange: function (a) {
            for (var i = 0; i < date.length; i++) {
                if (date[i].value === a.bs) {
                    SetDateValue(date, i, a.ad);
                }
            }
        }
    });
}

function SetDateValue(date, i, adDate) {
    date[i].closest('td').getElementsByClassName('AdDate')[0].value = adDate;
}

function NepaliDatePickerCalWithAdDateConverter(NpDate, AdDate) {
    
    var cDate = GetNepaliCurrentDate();
    NpDate.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        onChange: function (a) {
            AdDate.value = a.ad;
        }
    });
    NpDate.value = NpDate.value || cDate;
    AdDate.value = AdDate.value || GetADDate();
}


function NepaliDatePickerCalWithAdDateWithDisableNextDate(NpDate, AdDate) {
    
    var currentDate = GetNepaliCurrentDate();
    NpDate.nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        //disableAfter: currentDate,
        onChange: function (a) {
            if (AdDate !== '') {
                AdDate.value = a.ad;
            }
        }
    });
    NpDate.value = currentDate;
    if (AdDate !== '') {
        var dt = new Date(AdDate.value);
        var year = dt.getFullYear();
        if (year > 2001) {
            var month = dt.getMonth() + 1;
            var day = dt.getDate();
            NpDate.value = GetNepaliDateFromEnglishDate(year, month, day);
        } else {
            AdDate.value = GetADDate();
        }
    }
}

function NepaliDatePickerStaticDateForClass(date) {
    var currentDate = GetNepaliCurrentDate();
    var nepaliDate = englishToNepali(currentDate);
    for (var i = 0; i < date.length; i++) {
        date[i].textContent = nepaliDate;
    }
}

function englishToNepali(number) {
    var englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', "-", "/"];
    var nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९', "-", "/"];
    var numberToConvert = number.toString().split('');
    var result = "";
    for (var i = 0; i < numberToConvert.length; i++) {
        for (var j = 0; j < englishNumbers.length; j++) {
            if (numberToConvert[i] === englishNumbers[j]) {
                result += nepaliNumbers[j];
            }
        }
    }
    return result;
}

function GetNepaliCurrentFiscalYearMonths() {
    var data = new Array();
    var extraMonth = 0;
    for (var i = 0; i < 12; i++) {
        var month;
        var year;
        if (i < 9) {
            month = (i + 4);
            year = NepaliFunctions.GetCurrentBsYear();
        } else {
            month = ++extraMonth;
            year = NepaliFunctions.GetCurrentBsYear() + 1;
        }
        var lastMonthDay = NepaliFunctions.GetDaysInBsMonth(year, month);
        var row = {};
        row.RowNo = i;
        row.Month = month;
        row.MonthName = NepaliFunctions.GetBsMonthInUnicode((month - 1));
        row.StartAdDate = GetAdDateFromNepaliDate(year + '-' + month + '-01');
        row.EndAdDate = GetAdDateFromNepaliDate(year + '-' + month + '-' + lastMonthDay);
        data.push(row);
    }
    return data;
}

// For Calender
function getNepaliYear() {
    var extra = 5;
    var year = NepaliFunctions.GetCurrentBsYear();
    year = parseInt(year + extra);
    var maxpreYear = parseInt(10 + extra);
    var startYear = year - maxpreYear;

    var previousYear = new Array();
    for (var i = 0; i < maxpreYear; i++) {
        var row = {};
        row.value = startYear;
        row.text = englishToNepali(startYear);
        ++startYear;
        previousYear.push(row);
    }
    return previousYear;
}

function getNepaliStartDateWithYearAndMonth(year, month) {
    var data = GetAdDateFromNepaliDate(year + '-' + month + '-01');
    return data;
}
function getNepaliEndDateWithYearAndMonth(year, month) {
    var lastMonthDay = NepaliFunctions.GetDaysInBsMonth(year, month);
    var data = GetAdDateFromNepaliDate(year + '-' + month + '-' + lastMonthDay);
    return data;
}
function getNepaliMonthsWithAdDate() {
    var data = new Array();
    for (var i = 0; i < 12; i++) {
        var month = (i + 1);
        var year = NepaliFunctions.GetCurrentBsYear();
        var lastMonthDay = NepaliFunctions.GetDaysInBsMonth(year, month);
        var row = {};
        row.Month = month;
        row.MonthName = NepaliFunctions.GetBsMonthInUnicode(i);
        row.StartAdDate = GetAdDateFromNepaliDate(year + '-' + month + '-01');
        row.EndAdDate = GetAdDateFromNepaliDate(year + '-' + month + '-' + lastMonthDay);
        data.push(row);
    };
    return data;
}