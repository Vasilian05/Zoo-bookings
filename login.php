<?php include 'includes/header.php' ?>
<?php include 'user.class.php' ?>

<?php 

//check if the form is submited 
if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  
  //create a new instance of the user class
  $user = new User();
  $user->setEmailPass($email, $pass);
  $user->checkLogin();
  
}

?>

<h1 class="mt-5 text-center"> Login</h1>

<form  class="w-25 m-auto mt-5"method="POST">

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input name="email" required type="email" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button name="submit"type="submit" class="btn btn-primary">Submit</button>
</form>