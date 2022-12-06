<?php

namespace App\Service;

use App\Repository\ItemRepository;
use App\Entity\Product;
use App\Entity\Item;

class ItemService {
    private $itemRepository;

    public function __construct(ItemRepository $ItemRepository)
    {
        $this->itemRepository = $ItemRepository;        
    }
    public function generateAmount(Item $item) {
        $price = $item->getProduct()->getPrice();
        $quantity = $item->getQuantity();
        
        $item->setAmount($quantity*$price);
    }
    public function generateTaxAmount(Item $item) {
        $tax = $item->getProduct()->getTax()/100;
        $amount = $item->getAmount();
        
        $item->setTaxAmount(($amount/(100+$tax))*$tax);
    }
}