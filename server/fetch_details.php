<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
$all_months = array(

    '01' => 'January',

    '02' => 'February',

    '03' => 'March',

    '04' => 'April',

    '05' => 'May',

    '06' => 'June',

    '07' => 'July',

    '08' => 'August',

    '09' => 'September',

    '10' => 'October',

    '11' => 'November',

    '12' => 'December'

);

$zodiac_info = array(


 array(

     'sign' => 'Aries',

     'startdate' => 'Mar 21',

     'enddate' =>  'Apr 19',

     'description' => 'There is nothing an Aries cannot achieve once they set their mind to it—no mountain is too high. However, you will also find them nursing a hidden imposter syndrome that can chip away at their confidence if allowed free rein.',

     'image' => 'aries.jpeg'
 ),

 array(

    'sign' => 'Scorpio',

    'startdate' => 'Oct 23',

    'enddate' => 'Nov 21',

    'description' => 'The fiery, intense personality of a Scorpio can make any time spent together a wild, dizzying ride. But while they will go the extra mile to take care of your emotional needs, they remain notoriously secretive about their own—good luck cracking open the spine of this closed book. ',

    'image' => 'scorpius.jpeg'
),

 array(

     'sign' => 'Taurus',

     'startdate' => 'Apr 20',

     'enddate' => 'May 20',

     'description' => 'Loyal to a fault, a Taurean is the most reliable person you can have in your corner when the chips are down. However, they have a stubborn streak a mile wide and can hold a grudge like no one else, so make sure you don’t cross them.',

     'image' => 'taurus.jpeg'
 ),

 array(

     'sign' => 'Gemini',

     'startdate' => 'May 21',

     'enddate' => 'Jun 20',

     'description' => 'Throw a Gemini to the wolves, and they will come back leading the pack—the air element in this sign means that they can adapt easily to any situation. But their fuse runs short and once they run out of patience with someone, there is no wiggle room for second chances.',

     'image' => 'gemini.jpeg'
 ),

 array(

     'sign' => 'Cancer',

     'startdate' => 'Jun 21',

     'enddate' => 'Jul 22',

     'description' => 'Behind the brooding fortress that a Cancer has erected to protect themselves are abundant reserves of deep, undying love and loyalty. Pity that few will get to experience it because they aren’t the best at communicating what is in their hearts.',

     'image' => 'cancer.jpeg'
 ),

 array(

     'sign' => 'Leo',

     'startdate' => 'Jul 23',

     'enddate' => 'Aug 22',

     'description' => 'Born to be under the spotlight, there is nothing that this lion enjoys as much as being the cynosure of all eyes. However, this innate conviction that they are always in the right means that they can often run roughshod over others’ feelings and sentiments.',

     'image' => 'leo.jpeg'
 ),

 array(

     'sign' => 'Virgo',

     'startdate' => 'Aug 23',

     'enddate' => 'Sep 22',

     'description' => 'Meticulous, organised and diligent, if the world were to end tomorrow, you would want a Virgo to lead the march into the new dawn. However, that pesky niggle of self-doubt in their head means that they are often harsher on themselves than anybody else can be.',

     'image' => 'virgo.jpeg'
 ),

 array(

     'sign' => 'Sagittarius',

     'startdate' => 'Nov 22',

     'enddate' => 'Dec 21',

     'description' => 'There is no storyteller quite like a Sagittarius—they can have the entire room hanging on their every word. But while they can show you grand dreams, it can sometimes be hard to pin them down and make them deliver on their promises.',

     'image' => 'sagittarius.jpeg'
 ),

 array(

     'sign' => 'Capricorn',

     'startdate' => 'Dec 22',

     'enddate' => 'Jan 19',

     'description' => 'Not everyone can conquer the world but if a Cap were to set out to do it, nothing would deter them until they had accomplished their goal. With a personality that is hardwired in practicality, they can often fail to appreciate nuance and are known to be unforgiving of others’ mistakes.',

     'image' => 'capricorn.jpeg'
 ),

 array(

     'sign' => 'Aquarius',

     'startdate' => 'Jan 20',

     'enddate' => 'Feb 18',

     'description' => 'A deep-thinker with a humanitarian streak, an Aquarian has grand plans to change the world. Shame that they left the party early though because their reclusive nature makes it hard for them to establish bonds with those around them.',

     'image' => 'aquarius.jpeg'
 ),

 array(

    'sign' => 'Libra',

    'startdate' => 'Sep 23',

    'enddate' => 'Oct 22',

    'description' => "Along with Gemini and Aquarius, you’re an Air element, making you charming and cool. You probably have no difficulty making friends; people are drawn to you. If there's one thing you can't stand, it's being alone. Loneliness can creep up on you and hit you like a ton of bricks. You're probably a relationship person because, whether you like to admit it or not, you love love.",

    'image' => 'libra.jpeg'
),

 array(

     'sign' => 'Pisces',

     'startdate' => 'Feb 19',

     'enddate' => 'Mar 20',

     'description' => 'If you are looking to escape the mundane everyday grind, a Pisces’s imaginative mind can whisk you away into a realm of fantasy. Their kind, nurturing personality can prove to be a double-edged sword though, because their overtly sensitive heart is easily wounded, further compounded by a tendency to play the victim.',

     'image' => 'pisces.jpeg'
 ),


);

$initial_date = (string) $_POST['date'];

$birth_date = date_create($initial_date);

$todays_date = date_create(date("Y/m/d"));

$split_date = explode("-", $initial_date);

$birth_month =  $split_date[1]; //remember change dem to int back

$birth_year =  $split_date[0];

$birth_day =  $split_date[2];


$counter = 0;

$d = strtotime($all_months[$birth_month] . $birth_day);

$new_initial_date = date("M d", $d);



$diff = date_diff($birth_date, $todays_date);


$years = (int) $diff->format("%y");
// echo $years . " years" . "<br>";

$months = (int) $diff->format("%m");
// // echo $months . " months" . "<br>";

$days = (int) $diff->format("%d");
// // echo $days . " days" . "<br> <br>";

$total_days = (int) $diff->format("%a");
// // // echo $total_days . " total days lived " . "<br>";

$total_weeks = floor(($total_days / 7));
// // // echo $total_weeks . " total weeks lived" . "<br>";

$total_months = ($years * 12) + $months;
// // // echo $total_months . " total months lived" . "<br>";

$total_hours = (int) $diff->format("%a") * 24;
// // // echo $total_hours . " total hours lived" . "<br>";

$total_minutes =  $total_hours * 60;
// // // echo $total_minutes . " total minutes lived" . "<br>";

$total_seconds =  $total_minutes * 60;
// // // echo $total_seconds . " total seconds lived" . "<br>";


$find_day_born = mktime(0, 0, 0, $split_date[1], $split_date[2], $split_date[0]);
$day_born = date("l", $find_day_born);
// // // echo $day_born . " You were born" . "<br>";


if ((int) date("m") > (int)$split_date[1]) { //if present month dey greater than birth month, add one to year

    $year = (int) date("Y") + 1;

    $next_date = date_create("$year-$birth_month-$birth_day");

}   else {

    $year = (int) date("Y");

    $next_date = date_create("$year-$birth_month-$birth_day");

}


$another_diff = date_diff($todays_date, $next_date);

$days_till_next_birthday = (int) $another_diff->format("%a");

// echo $days_till_next_birthday . " days until next birthday";



function get_zodiac_info () { //GO THROUGH THE ZODIAC INFO AND GET THE ONE DAT MATCHES USERS BIRTHDATE

global $counter;

global $zodiac_info;

global $new_initial_date;


while($counter < count($zodiac_info)) {

    $current_array = $zodiac_info[$counter];

    $startdate = $current_array['startdate'];
  
    $enddate = $current_array['enddate'];
    
    if ($new_initial_date == $startdate ||
        $new_initial_date == $enddate) {
  
        return $current_array;

        break;
  
    } else {
  
      while ($startdate != $enddate ) {
  
         $d = strtotime($startdate . ' +1 day');
  
         $startdate = date("M d", $d);

        if ($startdate == $new_initial_date) {
  
          return $current_array;
  
          break;
  
        }
        
  
      }
  
    }
  
    $counter++;
  
   }
  
}




 $data = array(
     
    'message' => 'success', 
    
    'date' => $birth_day . " " . $all_months[$birth_month] . " " . $birth_year,

    'years' => $years,

    'months' => $months,

    'days' => $days,

    'total_days' => $total_days,

    'total_weeks' => $total_weeks, 

    'total_months' => $total_months,

    'total_hours' => $total_hours,

    'total_minutes' => $total_minutes,

    'total_seconds' => $total_seconds,

    'day_born' => $day_born,

    'days_till_next_birthday' => $days_till_next_birthday,

    'zodiac_info' =>  get_zodiac_info(),
);
   
    header('Content-Type: application/json');

    $response = json_encode($data);

    echo $response;

    exit();

} else {

    
   header('Content-Type: application/json');

    http_response_code(405);

    echo json_encode(array('error' => 'Method Not Allowed'));

}

?>
