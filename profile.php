<?php include 'includes/header.php';?>
<?php include 'classes/user.class.php';?>
<?php include 'classes/hotelBooking.class.php';?>

<?php 

$user = new User();

$user_data = $user->getUser($_COOKIE['user_id']);

print_r($user_data);
?>
<h1>Welcome <?php echo ucwords($user_data[0]['first_name'])?></h1>










<?php include 'includes/footer.php';?>