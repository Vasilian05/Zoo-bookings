<?php include_once 'includes/header.php'; ?>
<?php include_once 'classes/hotelBooking.class.php'; ?>

<?php 
if(isset($_POST['search'])){

    $month = $_POST['month'];
    $room_type = $_POST['room_type'];
    


    //getting the last day of the month 
    $last_date= new DateTime();
    $last_date = new DateTime('20-03-2024');
    $last_date->modify('last day of '. $month);
    $last_date = date_format($last_date,"Y/m/d");

    //getting the first day of the month
    $first_date= new DateTime();
    $first_date = new DateTime('20-03-2024');
    $first_date->modify('first day of '. $month);
    $first_date = date_format($first_date,"Y/m/d");




    $test = new HotelBooking();

    $arr_bookings = $test->bookedDates($first_date, $last_date, $room_type);

    //print_r($arr_bookings);
    // print_r($arr_bookings);
    $duplicates = $test->checkDuplicates($arr_bookings, 2);

    //save duplicates in session
    $_SESSION['availability'] = $duplicates;

    header('location: booking.php');
    // --------------for tomorrow, try saving this data into a session and retrieve it when they want to book------
}


?>

<div class="container text-center">
    <h1 class="mt-2">Curious what rooms we have available? 👇🏻</h1>
    <form method="POST">
  <div class="row align-items-start mt-5">
        <div class="col">
        <div class="input-group mb-3">
            <label class="input-group-text" >Month</label>
            <select required class="form-select" name="month">
            <option value="">Choose...</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>s
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
            </select>
        </div>
        </div>
        <div class="col">
            <div class="input-group mb-3">
            <label class="input-group-text">Room type</label>
            <select required class="form-select" name="room_type">
                <option value="">Choose...</option>
                <option value="1">Single room</option>
                <option value="2">Double room</option>
            </select>
            </div>
        
        </div>
        <div class="col">
            <input name="search"type="submit" class="btn btn-outline-dark w-50"></input>
        </div>
    </div>
</form>
</div>


<?php include_once 'includes/header.php'; ?>