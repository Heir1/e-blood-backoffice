<?php

namespace App\Models;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item, $bloodsquantity){

            $storedItem = ['qty' => 0, 'product_id' => 0, 'designation' => $item->designation,
            'bloodsprice' => $item->bloodsprice, 'bloodsquantity' => $bloodsquantity, 'hospital' => $item->hospital, 'item' =>$item];

            if($this->items){
                if(array_key_exists($item->id, $this->items)){
                    $storedItem = $this->items[$item->id];
                }
            }

            $storedItem['qty']++;
            $storedItem['product_id'] = $item->id;
            $storedItem['designation'] = $item->designation;
            $storedItem['bloodsprice'] = $item->bloodsprice;
            $storedItem['bloodsquantity'] = $bloodsquantity;
            $storedItem['hospital'] = $item->hospital;

            $this->totalQty++;
            $this->totalPrice += $item->bloodsprice;
            $this->items[$item->id] = $storedItem;

        }

        public function updateQty($id, $qty){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['bloodsprice'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['bloodsprice'] * $qty;
        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['bloodsprice'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }


    }

?>