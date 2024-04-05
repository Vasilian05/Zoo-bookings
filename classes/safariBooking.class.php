<?php 
include 'config.php';
include 'interfaces&traits/booking.interface.php';
?>



<?php 

class SafariBooking extends Dbh implements Booking {
    

    private function isLoggedIn(){

        //check if cookie is exists
        if(isset($_COOKIE['is_logged_in'])){
             $user_id =$_COOKIE['user_id'];
             return $user_id;
        }else{
            return false;
        }
    }
    
    public function makeBooking(){
        

        //check if user is logged in
        if(!$this->isLoggedIn()){

            header('location:register.php');
            return 'In order to make a booking you need to create or log in to your account';
        }else{
            $user_id = $this->isLoggedIn();
            
            $tickets = $_SESSION['Cart'];
            print_r($tickets);
            //prepare a statement 
            // $stmt = $this->connect()->prepare('INSERT INTO SafariBookings(user_id, booking_date, adult_ticket, child_ticket, baby_ticket) VALUES(?, ?, ?, ?, ?)');

            // if($stmt->execute([$user_id, ])){

            // }
        }

        //get the tickets from session

        //prepare a query 

        //save booking in d



    }

    public function cancelBooking(){}

    public function displayBooking(){}


}