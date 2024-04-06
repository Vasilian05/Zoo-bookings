<?php include 'includes/header.php';?>
<?php include 'classes/user.class.php';?>
<?php include 'classes/hotelBooking.class.php';?>

<?php 

$user = new User();

$user_data = $user->getUser($_COOKIE['user_id']);

print_r($user_data);
?>
<h1>Welcome <?php echo ucwords($user_data[0]['first_name'])?></h1>

<div class="container text-center mt-5">
  <div class="row align-items-start">
    <div class="col-6">
        <h2>Proflile</h2>
        <form  class="w-75 m-auto mt-5"method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input name="first_name" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo ucwords($user_data[0]['first_name'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="last_name" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo ucwords($user_data[0]['last_name'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input name="email" required type="email" class="form-control" aria-describedby="emailHelp"placeholder="<?php echo $user_data[0]['email']?>" >
            </div>
            <button name="submit"type="submit" class="btn btn-outline-dark">Update</button>
        </form>
    </div>
    <div class="col-6">
      Previous Bookings
    </div>
  </div>
</div>








<?php include 'includes/footer.php';?>