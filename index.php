<?php include 'includes/header.php'?>
<?php include 'classes/safariBooking.class.php'?>

<?php 

$newtry = new SafariBooking();

echo $newtry->makeBooking();

?>




<?php include 'includes/footer.php'?>