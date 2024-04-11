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
    print_r($duplicates);
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



<div class="container text-center">
    <div class="row align-items-start mt-5">
        <div class="col-6">
            <table class="table table-borderless">
                <thead>
                    <tr>
                    <th scope="col"> </th>
                    <th scope="col"><h3>Unavailable dates</h3></th>
                    </tr>
                </thead>
                <tbody> <?php
                    for($i = 0; $i < count($duplicates); $i++){ ?>
                        <tr>
                        <th scope="row"><?php $i+1 ?></th>
                        <td><?php echo $duplicates[$i];?></td>
                        </tr>
                        <tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
        <div class="col-6 text-start">
            <h3 class="text-center">Make a booking</h3>
            <form  class="w-75 mt-5"method="POST">
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input required name="date" type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Number of nights</label>
                    <input name="baby_tickets" type="number" class="form-control">
                </div>
                <div class="row mt-5">
                    <div class="col-6">
                        <button name="submit"type="submit" class="btn btn-dark w-100">Book</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>  

<?php include_once 'includes/header.php'; ?>