function passvalues(){
  var date = document.getElementById("date").value;
  var tstart = document.getElementById("tstart").value;
  localStorage.setItem("date",date);
  localStorage.setItem("tstart",tstart);
  alert("date saved");
  return false;
}
var dt = localStorage.getItem("date");
var ts = localStorage.getItem("tstart");

var dates = dt+" "+ts+":00"; 
// Set the date we're counting down to
var countDownDate = new Date(dates).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
 
  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML =seconds;
    
  // If the count down is over, write some text 
  if (distance < 0) {
                let headline = document.getElementById("headline"),
                    countdown = document.getElementById("countdown"),
                    content = document.getElementById("content");
      
                headline.innerText = "It's my election day!";
                countdown.style.display = "none";
                content.style.display = "block";
      
                clearInterval(x);
              }
},0);
