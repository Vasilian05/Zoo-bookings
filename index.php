<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>
<?php
$d = new DateTime();
$d = new DateTime('20-03-2024');
    //$d->modify('last day of april');
   // echo $d->format('jS, F Y');
$x = date_create('12-03-2024');
$y = date_diff($x, $d);
echo $y->format('%d');

$test = new HotelBooking();

 $arr_bookings = $test->bookedDates();

print_r($arr_bookings);
 print_r($test->checkDuplicates($arr_bookings));
?>


<br>
<br>

<?php 

// print_r($test->getRooms(1));
?>

<?php include 'includes/footer.php'?>