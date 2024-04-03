<?php include 'includes/header.php'?>




<h1 class="mt-5 text-center"> Tickets</h1>

<form  class="w-25 m-auto mt-5"method="POST">

  <div class="mb-3">
    <label class="form-label">Adult Tickets</label>
    <input name="adult_tickets" type="number" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Child Tickets</label>
    <input name="child_ticket" type="number" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Baby Tickets</label>
    <input name="child_ticket" type="number" class="form-control">
  </div>
  <button name="submit"type="submit" class="btn btn-dark">Submit</button>
</form>








<?php include 'includes/footer.php'?>