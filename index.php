<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>


<?php 

$hotel = new HotelBooking();
$dates = array('24-04-2024', '25-04-2024', '26-04-2024');
$hotel->findRoom($dates, 1);

?>


<?php include 'includes/footer.php'?>