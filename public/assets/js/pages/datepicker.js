$(function () {
   $('#datetimepicker12').datetimepicker({
       inline: true
   });
   var dayOfWeek, dayOfMonth, jsDate;
   var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
   $("#datetimepicker12").on("dp.change", function(e) {
       jsDate = dataFromTimestamp(e.date);
       dayOfWeek = days[jsDate.dayInTheWeek];
       dayOfMonth = jsDate.dayInMonth + getOrdinal(jsDate.dayInMonth);
       $('.date-label').text('');
        $('.picker-switch').append('<span class="date-label">'+ dayOfWeek + ' ' + dayOfMonth +'</span>');
    });
   $("#datetimepicker12").on("dp.update", function(e) {
       var str = $('.date-label').text();
       $('.date-label').text('');
        $('.picker-switch').append('<span class="date-label">'+ str +'</span>');
    });

   getDateLabel($('.day.active').attr('data-day'));
    function dataFromTimestamp(timestamp){
        var d = new Date(timestamp);

        // Time
        var h = addZero(d.getHours());              //hours
        var m = addZero(d.getMinutes());            //minutes
        var s = addZero(d.getSeconds());            //seconds

        // Date
        var da = d.getDate();                       //day
        var mon = d.getMonth() + 1;                 //month
        var yr = d.getFullYear();                   //year
        var dw = d.getDay();                        //day in week

        // Readable feilds
        months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
        var monName = months[d.getMonth()];         //month Name
        var time = h + ":" + m + ":" + s;           //full time show
        var thisDay = da + "/" + mon + "/" + yr;    //full date show

        var dateTime = {
            seconds : s,
            minutes : m,
            hours : h,
            dayInMonth : da,
            month : mon,
            year : yr,
            dayInTheWeek : dw,
            monthName : monName,
            fullTime : time,
            fullDate : thisDay
        };
        return dateTime;

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }
    function getOrdinal(val){

        var mod = val % 10;
        if (mod === 1 && val !== 11) {
            return 'st';
        } else if (mod === 2 && val !== 12) {
            return 'nd';
        } else if (mod === 3 && val !== 13) {
            return 'rd';
        } else {
            return 'th';
        }
    }
    function getDateLabel(val){
        jsDate = new Date(val);
        dayOfWeek = days[jsDate.getDay()];
        dayOfMonth = jsDate.getDate() + getOrdinal(jsDate.getDate());
         $('.picker-switch').append('<span class="date-label">'+ dayOfWeek + ' ' + dayOfMonth +'</span>');
    }

});