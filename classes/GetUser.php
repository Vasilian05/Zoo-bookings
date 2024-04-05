<?php include_once 'config.php' ?>

<?

trait GetUser {


       //getting the user from db

       public function getUser($user_id){

        $stmt = $this->connect()->prepare('SELECT * FROM User WHERE user_id = ?');

        if($stmt->execute([$user_id])){
            
            //if user is found
            return $stmt->fetchAll();
        } else {
            //user is not found
            echo 'user not found';
        }
    }

    /*
    checks if the user is logged in
    if user is logged in then return the user id 
    if the user is not logged in then return false

    */
    public function isLoggedIn(){

        //check if cookie is exists
        if(isset($_COOKIE['is_logged_in'])){
            return $_COOKIE['user_id'];
        }else{
            return false;
        }


    }
}