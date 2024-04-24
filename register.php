<?php include 'includes/header.php' ?>
<?php include 'classes/user.class.php' ?>

<?php 

//check if the form is submited 
if (isset($_POST['submit'])){

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  
  //create a new instance of the user class
  $user = new User();

  $user->setNames($first_name, $last_name);
  $user->setEmail($email);
  $user->setPass($pass);
  $user->addUser();
}

?>

<h1 class="mt-5 text-center"> Register</h1>

<form  class="w-25 m-auto mt-5"method="POST">

  <div class="mb-3">
    <label class="form-label">First Name</label>
    <input name="first_name" required type="text" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label class="form-label">Last Name</label>
    <input name="last_name" required type="text" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input name="email" required type="email" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Privacy policy and terms and conditions</label>
  </div>
  <button name="submit"type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
</form>
 
<?php include_once 'includes/footer.php'; ?>