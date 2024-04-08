<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>
<?php


$test = new HotelBooking();

 $arr_bookings = $test->bookedDates();

// print_r($arr_bookings);
// print_r($arr_bookings);
print_r($test->checkDuplicates($arr_bookings, 1));
?>


<br>
<br>

<?php 

// print_r($test->getRooms(1));
?>

<?php include 'includes/footer.php'?>