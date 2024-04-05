<?php include 'includes/header.php'?>

<?php 

if (isset($_POST['submit'])) {
    include_once 'classes/cart.class.php';

    $adult_tickets = $_POST['adult_tickets'];
    $child_tickets = $_POST['child_tickets'];
    $baby_tickets = $_POST['baby_tickets'];
    $date = $_POST['date'];

    $cart = new Cart();
    $cart->TicketsToCart($adult_tickets, $child_tickets, $baby_tickets, $date);

}


?>


<h1 class="mt-5 text-center"> Tickets</h1>

<form  class="w-25 m-auto mt-5"method="POST">

  <div class="mb-3">
    <label class="form-label">Adult Tickets</label>
    <input name="adult_tickets" type="number" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Child Tickets</label>
    <input name="child_tickets" type="number" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Baby Tickets</label>
    <input name="baby_tickets" type="number" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Date</label>
    <input required name="date" type="date" class="form-control">
  </div>
  <div class="row mt-5">
    <div class="col-6">
        <button name="submit"type="submit" class="btn btn-dark w-100">Submit</button>
    </div>
    <div class="col-6">
        <button name="submit"type="submit" class="btn btn-outline-dark w-100">Clear</button>
    </div>
    
    
  </div>
</form>








<?php include 'includes/footer.php'?>