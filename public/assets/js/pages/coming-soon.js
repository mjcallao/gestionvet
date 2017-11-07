$( document ).ready(function() {

// set up time coming soon
var target_date = new Date("April 25, 2016").getTime();
 
// variables for time units
var days, hours, minutes, seconds;
 
var $days = $("#days"),
    $hours = $("#hours"),
    $minutes = $("#minutes"),
    $seconds = $("#seconds");
  
var center = 0,
    canvas = document.getElementById('timer'),
    ctx = canvas.getContext("2d"),
    daySetup = {  
    },
    hourSetup = {
    },
    minSetup = {
    },
    secSetup = {
    },
    check = function(count, setup, ctx) {
        if (count < setup.old){
          setup.counter++
        };
    };
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
     
    $days.text(days);
    $hours.text(hours);
    $minutes.text(minutes);
    $seconds.text(seconds);
}, 1000);
});