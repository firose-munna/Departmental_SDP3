<?php

function cardArray(){
    $cartCollection = Cart::getContent();
    return $cartCollection->toArray();
}
