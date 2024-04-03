<?php include 'includes/header.php'?>

<?php 

if (isset($_POST['submit'])) {
    $adult_tickets = $_POST['adult_tickets'];
    $child_tickets = $_POST['child_tickets'];
    $baby_tickets = $_POST['baby_tickets'];

    $tickets = array(
    "adult tickets" => $adult_tickets,
     "child tickets" => $child_tickets, 
     "baby_tickets" => $baby_tickets
    );
    
    //try foreach instead of for loop
    for($i=0; $i < count($tickets); $i++) {
        
        if($tickets[$i] > 0) {
            $_SESSON['Cart'] = $tickets[$i];
            var_dump( $_SESSION['Cart']);
        }
    }
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
  <button name="submit"type="submit" class="btn btn-dark">Submit</button>
</form>








<?php include 'includes/footer.php'?>