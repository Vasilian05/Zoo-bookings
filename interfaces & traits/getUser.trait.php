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
}