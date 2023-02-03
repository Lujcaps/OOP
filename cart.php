<?php

require_once "Medicine.php";
require_once "Product.php";

class Cart extends Medicine{
    private $cartItems = array();
	
    function addToCart($item){
        $this->cartItems[] = $item;
    }

    function viewCart(){
        $arrCartItems = $this->cartItems;
        foreach ($arrCartItems as $key => $value){
            echo 
            '<ul>
                <li>Name: ' . $value->getName() . '</li>
                <li>Description: ' . $value->getDescription() . '</li>
                <li>Price: ₱ ' . number_format($value->getPrice(), 2 ). '</li>
                <li>Dose: ' . $value->getDose() . '</li>
                <li>Type: ' . $value->getType() . '</li>
                <li>Exp Date: ' . $value->getExpirationDate() . '</li>
                <li>SRP: ' . $value->computeSRP() . '</li>
            </ul>
            <hr>';
        }
    }
    function computeTotal(){
        $totalPrice = 0;
        foreach($this->cartItems as $key => $Value){
            $totalPrice += $Value->computeSRP();
        }
        echo '<b>Total Cart Amount: </b> ₱ ' . number_format($totalPrice,2);
    }
}
?>