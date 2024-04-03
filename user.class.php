<?php include 'config.php' ?>

<?php

Class User extends Dbh {

    private $first_name;
    private $last_name;
    private $email;
    private $pass;

    //Setting properties
    public function setProperties($first_name, $last_name, $email, $pass) {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->email=$email;
        $this->pass=$pass;

    }


    //validation

    // checking for empty input

    private function checkEmpty(){
        $error_message = false;
        if ($this->first_name == '' || $this->last_name == '' || $this->email == '' || $this->pass== '') {
            
            //if any of the inputs are empty change the value of the error
            $error_message = true;
        }

        return $error_message;
        
    }


    //names validation
    private function checkName($name){
        $error = false;
        if(strlen($name) > 3 && strlen($name) < 14) {

            if(ctype_alpha($name)){
                return $error;
            }

        } else {  //name is less than 3 or more than 14 characters 
           $error = true;
        }
        return $error;
    }

    //email validation 
    private function checkEmail(){
        $error = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
          }
          return $error;
    }

    //password validation 
    private function checkPass(){
        $error = false;
        if(strlen($this->pass) > 3 && strlen($this->pass) < 8) {
            return $error;

        }else { //if password is less than 3 or more than 8 characters 
            $error = true;
        }
    }

    //sign user

    private function signUser(){
        
        //connect to DB and prepare a query
        $stmt = $this->connect()->prepare('INSERT INTO User(first_name, last_name, email, pass) VALUES(?, ?, ?, ?)');

        //hash passoword before inserting in DB
        $hashedPwd = password_hash($this->pass, PASSWORD_DEFAULT);

        //try to execute the query 
        if($stmt->execute([$this->first_name, $this->last_name, $this->email, $hashedPwd])){
            echo 'stmt successful';

        }else{  //if it fails set it equal to nothig and redirect user

            $stmt = null;
            header("location:index.php?error=stmtfailed");
            exit();
        }
    }
    //public methods 


    //Adding user

    public function addUser(){
        $error = "";
        //before user is added all validation methods must be ran
        if($this->checkEmpty()){
            $error = 'Input fields cannot be left empty';
        }
        if($this->checkName($this->first_name)){
            $error = 'First name can only contain alphabetical values';
        }
        if($this->checkName($this->last_name)){
            $error = 'last name can only contain alphabetical values';
        }
        if($this->checkEmail()){
            $error = 'Please enter a valid email address';
        }
        if($this->checkPass()){
            $error = 'Password must be between 3 and 8 characters';
        }

        //if there are no errors 
        if($error == ''){
            $this->signUser();

        }else {
            echo $error;
        }

    }

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

    //loyalty discount

    //


}