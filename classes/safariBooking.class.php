<?php include 'config.php' ?>


<?php 

class SafariBooking extends Dbh implements Booking {

    use GetUser;

    public function makeBooking(){

        //check if user is logged in
        if(!$this->isLoggedIn()){

            header('location:register.php');
            return 'In order to make a booking you need to create or log in to your account';
        }else{
            $user_id = $this->isLoggedIn();
            echo $user_id;
        }

        //get the tickets from session

        //prepare a query 

        //save booking in d



    }

    public function cancelBooking(){}

    public function displayBooking(){}


}