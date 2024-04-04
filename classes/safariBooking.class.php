<?php include 'config.php' ?>

<?php 

class SafariBooking extends Dbh implements Booking {

    use GetUser;

    public function makeBooking(){}

    public function cancelBooking(){}

    public function displayBooking(){}


}