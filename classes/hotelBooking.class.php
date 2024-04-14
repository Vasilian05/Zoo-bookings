<?php include_once 'config.php'; ?>
<?php include_once 'interfaces&traits/booking.interface.php'; ?>



<?php

class HotelBooking extends Dbh implements Booking {


    // -------------Availability-------------
    
//fetch bookings for a month
private function getBookings($date_start, $date_end, $room_type){

    $stmt = $this->connect()->prepare('SELECT * FROM HotelBookings WHERE date_start > ? AND date_end < ? AND room_id IN (SELECT room_id FROM Room WHERE room_type_id = ?)');
    if($stmt->execute([$date_start, $date_end, $room_type])){
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

//count the number of duplicates and return unavailable dates
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

public function checkDates($duplicates, $date_start, $nights){

    //date('Y-m-d', strtotime($Date. ' + 1 days'));
    for($i = 0; $i < $nights; $i++){
        $new_date = date('d-m-Y', strtotime($date_start .' + ' .$i. ' days'));

        for($x = 0; $x < count($duplicates); $x++){

            //check if the new date is in the list with unavailable dates
            if($new_date == $duplicates[$x]){

                return false;
            }
        }
    }

    return 'free';

}
public function makeBooking(){}

public function cancelBooking(){}

public function displayBooking($user_id){}


}
