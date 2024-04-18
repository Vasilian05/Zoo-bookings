<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>


<?php 

$hotel = new HotelBooking();
$dates = array('2024-04-21', '2024-04-22', '2024-04-23');
var_dump( $hotel->findRoom($dates, 1));

?>


<?php include 'includes/footer.php'?>