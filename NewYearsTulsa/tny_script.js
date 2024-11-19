"use strict";

/*
   New Perspectives on HTML5 and CSS3, 8th Edition
   Tutorial 9
   Tutorial Case

   Countdown Clock
   Author: MrJ
   Date: 11/19/2024

*/

window.alert("Welcome to Tulsa");

// Display the current date and time
document.getElementById("dateNow").innerHTML = "m/d/y<br />h:m:s";

// Display the time left until New Year's Eve
document.getElementById("days").textContent = "dd";
document.getElementById("hrs").textContent = "hh";
document.getElementById("mins").textContent = "mm";
document.getElementById("secs").textContent = "ss";

// Execute the function to run and display the countdown clock
runClock();
setInterval("runClock()", 1000);

// Function to create and run the countdown clock
function runClock() {
    // Store the current date and time
    var currentDay = new Date();
    var dateString = currentDay.toLocaleDateString();
    var timeString = currentDay.toLocaleTimeString();

    // Display the current date and time
    document.getElementById("dateNow").innerHTML = dateString + "<br />" + timeString;

    // Calculate the days until January 1st
    var newYear = new Date("January 1, " + (currentDay.getFullYear() + 1));
    var daysLeft = (newYear - currentDay)/(1000 * 60 * 60 * 24);

    // Calculate the hours left in the current day
    var hoursLeft = (daysLeft - Math.floor(daysLeft)) * 24;

    // Calculate the minutes and seconds left in the current hour
    var minutesLeft = (hoursLeft - Math.floor(hoursLeft)) * 60;
    var secondsLeft = (minutesLeft - Math.floor(minutesLeft)) * 60;

    // Display the time left until New Year's Eve
    document.getElementById("days").textContent = Math.floor(daysLeft);
    document.getElementById("hrs").textContent = Math.floor(hoursLeft);
    document.getElementById("mins").textContent = Math.floor(minutesLeft);
    document.getElementById("secs").textContent = Math.floor(secondsLeft);
}
