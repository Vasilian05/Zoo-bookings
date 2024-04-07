<?php include_once 'config.php'; ?>
<?php include_once 'interfaces&traits/booking.interface.php'; ?>



<?php

class HotelBooking extends Dbh implements Booking {

    
//fetch bookings for a month
private function getBookings($date_start, $date_end){

    $stmt = $this->connect()->prepare('SELECT * FROM HotelBookings WHERE date_start > ? AND date_end < ?');

    if($stmt->execute([$date_start, $date_end])){
        $booked_dates = $stmt->fetchAll();
        return $booked_dates;
    }else {
        $stmt = null;
        $err_message = 'Error occurred, please try again later';
        return $err_message;
    }

}


public function calcDates(){

    $bookings = $this->getBookings('2024-04-01', '2024-04-30');
        

        $arr_dates = [];
    
        //push all dates that are booked in array
        for($i = 0; $i < count($bookings); $i++){
            $date_start = new DateTime($bookings[$i]['date_start']);
            //$newDate = date("d-m-Y", strtotime($orgDate));  
            $date_end = new DateTime($bookings[$i]['date_end']);
            array_push($arr_dates, $date_start); //push the start day to the array
            $diff = date_diff($date_start, $date_end);

            //get the dates in-between start and end date and push them in array
            // for($x = 0; $x < $diff; $x++){
            //     $new_date = $date_start + $x;
            //     array_push($arr_dates, $new_date);
            // }
            // array_push($arr_dates, $date_end);
            // 
        }

        var_dump($arr_dates);
        
// $x = date_create('12-03-2024');
// $y = date_diff($x, $d);
// echo $y->format('%d');

}

private function converDiff($date_start, $diff){
    $start_to_end_dates = [];

    for($i = 0; $i < $diff; $i++){
        $new_date = $date_start + $i;
        array_push($start_to_end_dates, $new_date);
    }

    return $start_to_end_dates;

}

public function availability($booking_dates){

    
}



public function makeBooking(){}

public function cancelBooking(){}

public function displayBooking($user_id){}


//array with booked dates for the month x
// check for duplicates 
// save number of duplicates in variable 
// if that integer is equal to the number of rooms of that type the room is booked



}