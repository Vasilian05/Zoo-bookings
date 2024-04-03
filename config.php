<?php 


Class Dbh {

private $host= 'localhost';
private $db = 'zoo';
private $user = 'root';
private $pwd = '';


protected function connect() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    return $pdo;
}
}


?>