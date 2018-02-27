<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0.00;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalPrice = number_format($oldCart->totalPrice, 2);
            $this->totalQty = $oldCart->totalQty;
        }
        
    }

    public function add($item, $id, $product_quantity)
    {
        
        $description = json_decode($item->description, true);
        $item_price = number_format(floatval(str_replace(',', '.', $description['price'])), 2);

        if (isset($description['main_picture_url']))
        {
            $product_img = $description['main_picture_url'];
        }
        elseif(isset($description['upload_main_picture']))
        {
            $product_img = '/storage/upload_pictures/'.$id.'/'.$description['upload_main_picture'];
        }
        else
        {
            $product_img = '/storage/common_pictures/noimage.jpg';
        }

        $storedItem = [
            'qty' => 0,
            'total_item_price' => $item_price,
            'item' => $item,
            'item_price' => $item_price,
            'item_title' => $description['title_product'],
            'item_pic' =>  $product_img
        ];

        if($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty'] = $product_quantity;
        $storedItem['total_item_price'] = number_format($item_price * $storedItem['qty'], 2);
        $this->items[$id] = $storedItem;

        $this->recalculate_items();
    }

    public function recalculate_items()
    {
        $this->totalPrice = 0.00;
        $this->totalQty = 0;
        
        foreach($this->items as $allItems)
        {
            $this->totalQty += $allItems['qty'];
            $this->totalPrice += number_format($allItems['total_item_price'], 2);
        }

    }

    public function removeItem($id)
    {
        unset($this->items[$id]);
        $this->recalculate_items($this->items);
    }
}