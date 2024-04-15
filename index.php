<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>


<?php 

$hotel = new HotelBooking();
$dates = array('2024-04-26', '2024-04-27', '2024-04-28');
echo $hotel->findRoom($dates, 1);

?>


<?php include 'includes/footer.php'?>