$(document).ready(function(){

/* FOR SIDE BAR */

let hamburger = $('#hamburger');

let side_bar = $('.side_bar');

hamburger.click( () => {

  side_bar.slideToggle()

})

$(window).resize( function() { //for desktops

  if (innerWidth >= 700) { 

   side_bar.show()

  }

})

/* FOR SIDE BAR */




//SUBMIT DATE
let date_btn = $("#date_btn");

let date = $("#date");

let loader = $(".loader");

let result_container = $(".result_container");

date_btn.prop('disabled', false);

loader.hide()

result_container.hide()

date_btn.click( (e) => {
 
result_container.hide()

e.preventDefault();

if (date.val().length == 0) {

 alert("Enter DOB")

} else {

 loader.show()

 date_btn.prop('disabled', false);
 
 $.ajax({
   url : 'https://moseremzy.github.io/Birthday_Calculator/server/fetch_details.php',
   type : 'POST',
   data :  {
       date: date.val()
   },

   success : function(response) {

    setTimeout(() => {

      loader.hide()

      if (response.message === "success") {

        result_container.show()
 
        result_container.html(` 
       
           <h1>${response.date} <i class="fa-solid fa-champagne-glasses"></i></h1>
         
           <hr class="hr">
         
           <div class = "grid_container">
     
           <div class = "item1 result">
               <h2>Day of birth</h2>
               <img src = "./images/ballon.png" alt="" srcset="">
               <h3>${response.day_born}</h3>
             </div>
     
           <div class = "item2 result">
             <h2>Your exact age</h2>
             <img src = "./images/cake.png" alt="" srcset="">
             <h3>${response.days} days</h3>
             <h3>${response.months} months</h3>
             <h3>${response.years} years</h3>
           </div>
     
           <div class = "item3 result">
             <h2>Your zodiac sign</h2>
             <div class = "zodiac_sign">
               <h4>${response.zodiac_info.sign} <img src = "./images/${response.zodiac_info.image}"></h4>
               ${response.zodiac_info.description}
             </div>
           </div>
     
           <div class = "item4 result">
             <h2>You have been alive for</h2>
             <div class = "alive_for">
               <p>Years: <b>${response.years}</b></p>
               <p>Total months: <b>${response.total_months.toLocaleString()}</b></p>
               <p>Total weeks: <b>${response.total_weeks.toLocaleString()}</b></p>
               <p>Total days: <b>${response.total_days.toLocaleString()}</b></p>
               <p>Total hours: <b>${response.total_hours.toLocaleString()}</b></p>
               <p>Total minutes: <b>${response.total_minutes.toLocaleString()}</b></p>
               <p>Total seconds: <b>${response.total_seconds.toLocaleString()}</b></p>
             </div>
           </div>
     
           <div class = "item5 result">
             <h2>Days until next birthday</h2>
             <div class = "next_birthday">
             <i class="fa-regular fa-calendar">
               <b>${response.days_till_next_birthday.toLocaleString()} days</b>
             </i>
           </div>
           </div>
     
           </div>
              
       `);
 
      } else {
 
           alert("Error occured, try again")
 
      }    
      
    }, 1000);
       
   }

 });

} 

}); 

})
