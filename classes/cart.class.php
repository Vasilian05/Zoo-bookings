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
    
        $cart = array();
        foreach($tickets as $key => $value){
    
            
            if($value >0) {
                $new_cart_item = array(
                    'ticket' => $key,
                    'quantity' => $value
                );
                array_push($cart, $new_cart_item);
            }
        }
        $_SESSION['Cart'] = $cart;
        print_r($_SESSION['Cart']);


}





}