<?php 

//Interface for booking classes

interface Booking {

    public function makeBooking();
    public function cancelBooking();
    public function displayBooking($user_id);
}




?>