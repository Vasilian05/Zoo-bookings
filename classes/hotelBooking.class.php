<?php include_once 'config.php'; ?>
<?php include_once 'interfaces&traits/booking.interface.php'; ?>



<?php

class HotelBooking extends Dbh implements Booking {


    // -------------Availability-------------
    
//fetch bookings for a month
private function getBookings($date_start, $date_end, $room_type){

    $stmt = $this->connect()->prepare('SELECT * FROM HotelBookings WHERE date_start > ? AND date_end < ? AND room_id IN (SELECT room_id FROM Room WHERE room_type_id = ?)');
    if($stmt->execute([$date_start, $date_end, 1])){
        $booked_dates = $stmt->fetchAll();
        return $booked_dates;
    }else {
        $stmt = null;
        $err_message = 'Error occurred, please try again later';
        return $err_message;
    }

}


//creates array with all booked dates including duplicates
public function bookedDates($first_date, $last_date, $room_type){

    //get the bookings in a given month
    $bookings = $this->getBookings($first_date, $last_date, $room_type);
        

        $arr_dates = [];
    
        for($i = 0; $i < count($bookings); $i++){
            
            $date_start = new DateTime($bookings[$i]['date_start']);
            $date_end = new DateTime($bookings[$i]['date_end']);
            
            //find the how many days apart is start date from end date
            $diff = date_diff($date_start, $date_end);
            
            //push the start date into the array
            $first_date = $date_start->format('d-m-Y');
            array_push($arr_dates, $first_date);

            //get the dates in-between start and end date and push them in array
            for($x = 1; $x < ($diff->d +1); $x++){
                
                $date_start->modify('+1 day');
                $new_date = $date_start->format('d-m-Y');
                
                array_push($arr_dates, $new_date);
            }
            
            
        }
        return $arr_dates;

}


public function checkDuplicates($arr_bookings, $number_of_rooms){
   
    $counts = array_count_values($arr_bookings);
    $values = array();
    foreach($counts as $number =>$count){
        if ($count >= $number_of_rooms){
            array_push($values, $number);
        }
    }
    return $values;
}

//count duplicates 

// <?php
// // Define the array
// $numbers = [4, 4, 4, 7, 4, 5, 6, 6, 6, 6]; // 6 is repeated 4 times

// // Count the occurrences of each number
// $counts = array_count_values($numbers);

// // Loop through the counts and print the repeated numbers along with their counts
// foreach ($counts as $number => $count) {
//     if ($count > 3) {
//         echo "$number is not available.\n";
//     } elseif ($count > 1) {
//         echo "Number $number is repeated $count times.\n";
//     }
// }





public function makeBooking(){}

public function cancelBooking(){}

public function displayBooking($user_id){}


//array with booked dates for the month x
// check for duplicates 
// save number of duplicates in variable 
// if that integer is equal to the number of rooms of that type the room is booked

//fetch the room ids of each type of room
//get the type of room room that user wants to check
//get the bookings of these types of rooms using ids 



}

//get number of bookings 

// if number of bookings is less than the number of rooms, == available 

//if number of bookings is equal or 