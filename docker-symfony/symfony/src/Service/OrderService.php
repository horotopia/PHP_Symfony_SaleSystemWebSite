<?php

namespace App\Service;

use App\Repository\OrderRepository;
use App\Entity\Order;

class OrderService {
    private $orderRepository;

    public function __construct(OrderRepository $OrderRepository)
    {
        $this->orderRepository = $OrderRepository;        
    }
    public function GenerateNumber(Order $order) {
        $lastOrder = $this->orderRepository->findByLastCreatedAt();
            if ($lastOrder) {
                $lastNumber = $lastOrder->getNumber();
                $loNumbers = preg_replace('/[^0-9]/', '', $lastNumber);
                $loLetters = preg_replace('/[^a-zA-Z]/', '', $lastNumber);
                if ($loNumbers == 99) {
                    $loNumbers = 1;
                    $loLetters++;
                } else { $loNumbers++; }
                $newOrder = $loLetters.$loNumbers;
            }
            else {
                $newOrder="A1";
            }
        
            $order->setNumber($newOrder);
    }
}