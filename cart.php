<?php include 'includes/header.php'?>




<h1 class="text-center mt-5">Cart</h1>
<div class="container text-center mt-5">
<?php 

if(isset($_SESSION['Cart'])){

$tickets = $_SESSION['Cart'];

?>


<div class="row align-items-start">
  <div class="col-9">
  <table class="table table-borderless">
      <thead>
          <tr>
          <th scope="col"> </th>
          <th scope="col">Ticket</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
          <th scope="col">Date</th>
          </tr>
      </thead>
      <tbody> <?php
      $date_index = sizeof($tickets) - 1; //the index of the date in the array

      //create a new row for each item in the array except date
      for($i = 0; $i < (sizeof($tickets) -1); $i++){ ?>
        <tr>
          <th scope="row"><?php $i+1 ?></th>
          <td><?php print_r($tickets[$i]['type']);?></td>
          <td>x<?php print_r($tickets[$i]['quantity']);?></td>
          <td>£8</td>
          <td><?php print_r($tickets[$date_index]['date']);?></td>
          <td> <button name="submit"type="submit" class="btn btn-outline-dark w-100">Remove</button> </td>
          </tr>
          <tr>
    <?php
    }?>
  </tbody>
  </table>
  </div>
  
  <div class="col-3">
  <div class="card">
      <div class="card-header">
          Summary
      </div>
      <div class="card-body">
          <h5 class="card-title">Subtotal:</h5>
          <p class="card-text">VAT tax:</p>
          <a href="#" class="btn btn-outline-dark w-100">Checkout</a>
      </div>
</div>
</div>

<?php
}else{

echo 'Nothing in cart';

}


?>


</div>



<?php include 'includes/footer.php'?>