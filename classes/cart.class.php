<?php include 'config.php' ?>

<?php 

class Cart {


public function TicketsToCart($adult_tickets, $child_tickets, $baby_tickets, $date){

    //save all tickets in associative array - key value pairs
    $tickets = array(
        "Adult ticket" => $adult_tickets,
         "Child ticket" => $child_tickets, 
         "Baby ticket" => $baby_tickets
        );
    
        //create an array for all items added to cart
        $cart = array();
        $arr_date = array('date' => $date);
        foreach($tickets as $key => $value){
    
            //check if there's 1 or more tickets for each type
            if($value >0) {
                $new_cart_item = array(
                    'type' => $key,
                    'quantity' => $value
                    
                );
                array_push($cart, $new_cart_item);  //push to original array
            }
        }
        array_push($cart, $arr_date); //pushing the date at the end of the array
        $_SESSION['Cart'] = $cart;  //save the cart array in session

}






}