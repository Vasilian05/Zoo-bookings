<?php include_once 'includes/header.php'; ?>

<?php 
if(isset($POST['search'])){

    $month = $POST['month'];
    $room_type = $_POST['room_type'];
    echo 'values are posted';

}

?>

<div class="container text-center">
    <h1 class="mt-2">Curious what rooms we have available? 👇🏻</h1>
    <form method="POST">
  <div class="row align-items-start mt-5">
        <div class="col">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Month</label>
            <select class="form-select" required name="month">
            <option selected>Choose...</option>
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
            <label class="input-group-text" for="inputGroupSelect01">Room type</label>
            <select class="form-select" required name="room_type">
                <option selected>Choose...</option>
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