<?php include 'includes/header.php';?>
<?php include_once 'classes/user.class.php';?>
<?php include_once 'classes/safariBooking.class.php';?>
<?php include_once 'classes/hotelBooking.class.php';?>

<?php 

$user = new User();
$bookings = new SafariBooking();
$user_data = $user->getUser($_COOKIE['user_id']);



if(isset($_POST['update'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $user->setNames($first_name, $last_name);
    $user->setEmail($email);
    $user->validateUpdate($user_data[0]['user_id']);


}
?>
<h1>Welcome <?php echo ucwords($user_data[0]['first_name'])?></h1>

<div class="container text-center mt-5">
  <div class="row align-items-start">
    <div class="col-6">
        <h2>Proflile</h2>
        <form  class="w-75 m-auto mt-5"method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input name="first_name" required type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo ucwords($user_data[0]['first_name'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="last_name" required type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo ucwords($user_data[0]['last_name'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input name="email" required type="email" class="form-control" aria-describedby="emailHelp" value="<?php echo $user_data[0]['email']?>" >
            </div>
            <button name="update" type="submit" class="btn btn-outline-dark">Update</button>
        </form>
    </div>
    <div class="col-6">
      <h2>Previous Bookings</h2>
      <?php 
      $past_bookings = $bookings->displayBooking($user_data[0]['user_id']);
      ?>
       <table class="table table-borderless mt-5">
      <thead>
          <tr>
          <th scope="col"> </th>
          <th scope="col">Reference number</th>
          <th scope="col">Total tickets</th>
          <th scope="col">Date</th>
          </tr>
      </thead>
      <tbody> <?php

      //create a new row for each item in the array except date
      for($i = 0; $i < count($past_bookings); $i++){ ?>
        <tr>
          <th scope="row"><?php $i+1 ?></th>
          <td>#<?php echo $past_bookings[$i]['booking_id']?></td>
          <td>x<?php echo ($past_bookings[$i]['adult_ticket'] + $past_bookings[$i]['child_ticket'] + $past_bookings[$i]['baby_ticket']) ;?></td>
          <td><?php echo $past_bookings[$i]['booking_date'] ?></td>
          </tr>
          <tr>
    <?php
    }?>
  </tbody>
  </table>
    </div>
  </div>
</div>








<?php include 'includes/footer.php';?>