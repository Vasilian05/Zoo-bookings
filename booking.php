<?php include_once 'includes/header.php'; ?>
<?php include_once 'classes/hotelBooking.class.php'; ?>
<?php include_once 'classes/cart.class.php'; ?>

<?php 

if(isset($_SESSION['availability'])){
    $duplicates = $_SESSION['availability'];


}else{
    $duplicates = [];
}

if(isset($_POST['book'])){

    $date_start = $_POST['date'];
    $nights = $_POST['nights'];

    $booking = new HotelBooking();

    //make sure the user is tryong to book available dates
    if($booking->checkDates($duplicates, $date_start, $nights)){
        $booking = array('Start date' => $date_start,
        'nights' => $nights);
        $_SESSION['hotel_booking'] =  $booking;
        echo 'booking is added to cart';
        
    } else {
        echo 'Please make sure the dates you are trying to book are available.';
    }
}
?>





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
                    <input required name="nights" type="number" class="form-control">
                </div>
                <div class="row mt-5">
                    <div class="col-6">
                        <button name="book"type="submit" class="btn btn-dark w-100">Book</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>  





<?php include_once 'includes/footer.php'; ?>