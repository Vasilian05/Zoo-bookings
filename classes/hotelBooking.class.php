<?php include_once 'config.php'; ?>
<?php include_once 'interfaces&traits/booking.interface.php'; ?>



<?php

class HotelBooking extends Dbh implements Booking {

    
//fetch bookings for a month
private function getBookings($date_start, $date_end, $room_type){

    $stmt = $this->connect()->prepare('SELECT * FROM HotelBookings WHERE date_start > ? AND date_end < ? AND room_id IN (SELECT room_id FROM Room WHERE room_type_id = ?)');
    $rooms = $this->getRooms($room_type);
    if($stmt->execute([$date_start, $date_end, 2])){
        $booked_dates = $stmt->fetchAll();
        return $booked_dates;
    }else {
        $stmt = null;
        $err_message = 'Error occurred, please try again later';
        return $err_message;
    }

}



public function bookedDates(){

    //get the bookings in a given month
    $bookings = $this->getBookings('2024-04-01', '2024-04-30', 1);
        

        $arr_dates = [];
    
        for($i = 0; $i < count($bookings); $i++){
            // $date_start = date('d-m-Y', strtotime($bookings[$i]['date_start']));
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


//getting all rooms of a specified type
public function getRooms($room_type){
    $stmt = $this->connect()->prepare('SELECT room_id FROM Room WHERE room_type_id = ?');

    if($stmt->execute([$room_type])){
        $rooms = $stmt->fetchAll();
        $room_id = [];
        for($i = 0; $i < count($rooms); $i++){
            array_push($room_id,  $rooms[$i]['room_id']);
        }
        return $room_id;


    }else{
        return 'error';
    }
}

public function checkDuplicates($arr_bookings){
   
    //NOTE FOR FUTURE DEVELOPMENT
    //If more rooms are added in the hotel, count the number of duplicates and compare it with the number of rooms. 
    //if the number of duplicates is less than the number of rooms, then it's available
    $duplicates = array_diff_assoc( 
        $arr_bookings,  
        array_unique($arr_bookings) 
    );
    return $duplicates;
}


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