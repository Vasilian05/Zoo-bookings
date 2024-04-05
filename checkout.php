<?php include 'includes/header.php'?>




<h1 class="text-center mt-5">Checkout</h1>
<div class="container text-center mt-5">
    <div class="row align-items-start">
        <div class="col-8">
            <h3 class="text-start">Billing details</h3>
            <form  class="w-50 mt-2"method="POST">

                <div class="mb-3">
                    <label class="form-label">Cardholder Name</label>
                    <input name="card_holder" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="Mr Steph J Curry">
                </div>
                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input name="email" required type="email" class="form-control" aria-describedby="emailHelp" placeholder="0000-0000-0000-0000">
                </div>
                <div class="mb-3">
                    <label class="form-label">Account Number</label>
                    <input name="acc_num" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="12341234">
                </div>
                <div class="mb-3">
                    <label class="form-label">CVV</label>
                    <input name="cvv" required type="text" class="form-control" aria-describedby="emailHelp" placeholder="123">
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiery Date</label>
                    <input name="exp_date" required type="date" class="form-control"  placeholder="00/00">
                </div>
            </form>
        </div>
        
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Summary
                </div>
                <div class="card-body">
                    <h5 class="card-title">Subtotal:</h5>
                    <p class="card-text">VAT tax:</p>
                    <button name="submit"type="submit" class="btn btn-outline-dark w-100 mt-2">Debit Card</button>
                    <button name="submit"type="submit" class="btn btn-outline-dark w-100 mt-2">PayPal</button>
                    <button name="submit"type="submit" class="btn btn-outline-dark w-100 mt-2">Apple Pay</button>
                </div>
            </div>
    </div>
</div>



<?php include 'includes/footer.php'?>


