<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add ($item, $qty, $id)
    {
    	$storedItem = ['qty' => $qty, 'price' => $item->product_price, 'item' => $item];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty'] = $qty;
    	$storedItem['price'] = $item->product_price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty += $qty;
    	$this->totalPrice += $item->product_price * $qty;
    }
}
