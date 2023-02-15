<?php
 namespace App;
 use Session;
class Cart {
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
    // public $pet_id = null;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            // $this->pet_id = $oldCart->pet_id;
        }
    }

    public function add($item, $pet, $id){
        // dd($this->items);
        $storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=> $item, 'pet'=>$pet];
        // dd($pet->id, $this->items[4]['pet']['id']);
        if ($this->items){
            if (array_key_exists($id, $this->items) ){
                $storedItem = $this->items[$id];
            }
        }
       //$storedItem['qty'] += $item->qty;
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        // $storedItem['pet'] = $pet;
        // dd($this->items, $storedItem);
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-= $this->items[$id]['item']['price'];
        $this->totalQty --;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}