<?php include_once 'config.php'; ?>
<?php include_once 'interfaces&traits/booking.interface.php';?>



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
            $adult_tickets = 0;
            $child_tickets = 0;
            $baby_tickets = 0;
            $date_index = sizeof($tickets) - 1; //the index of the date in the array

            //save the quantity of each ticket type in variable
            for($i = 0;$i < (count($tickets) - 1); $i++){

                if ($tickets[$i]['type'] == 'Adult ticket'){
                    $adult_tickets = $tickets[$i]['quantity'];
                }
                if ($tickets[$i]['type'] == 'Child ticket'){
                    $child_tickets = $tickets[$i]['quantity'];
                }
                if ($tickets[$i]['type'] == 'Baby ticket'){
                    $baby_tickets = $tickets[$i]['quantity'];
                }
            }
            //prepare a statement 
            $stmt = $this->connect()->prepare('INSERT INTO SafariBookings(user_id, booking_date, adult_ticket, child_ticket, baby_ticket) VALUES(?, ?, ?, ?, ?)');

            if(!$stmt->execute([$user_id, $tickets[$date_index]['date'], $adult_tickets, $child_tickets, $baby_tickets ])){
                $stmt = null;
                echo 'stmt failed';
                exit();
            }else{
                echo 'booked';
            }
        }

        //get the tickets from session

        //prepare a query 

        //save booking in d



    }

    public function cancelBooking(){}


    public function displayBooking($user_id){

        $stmt = $this->connect()->prepare('SELECT * FROM SafariBookings WHERE user_id = ?');

        if($stmt->execute([$user_id])){
            return $stmt->fetchAll();
        }else{
            $stmt = null;
            echo 'error occured';
            exit();
        }

    }


}