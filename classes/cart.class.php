<?php include 'config.php' ?>

<?php 

class Cart {

public function TicketsToCart($adult_tickets, $child_tickets, $baby_tickets){

    //save all tickets in associative array - key value pairs
    $tickets = array(
        "adult tickets" => $adult_tickets,
         "child_tickets" => $child_tickets, 
         "baby_tickets" => $baby_tickets
        );
    
        //create an array for all items added to cart
        $cart = array();
        foreach($tickets as $key => $value){
    
            //check if there's 1 or more tickets for each type
            if($value >0) {
                $new_cart_item = array(
                    'ticket' => $key,
                    'quantity' => $value
                );
                array_push($cart, $new_cart_item);  //push to original array
            }
        }
        $_SESSION['Cart'] = $cart;  //save the cart array in session


}





}