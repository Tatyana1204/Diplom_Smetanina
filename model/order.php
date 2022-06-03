<?php

class Order{

    
    public function __construct($orderId, $clientId, $orderSum, $pickupPointID,$products)
    {
        $this->orderId = $orderId;
        $this->clientId = $clientId;
        $this->orderSum = $orderSum;
        $this->pickupPointID = $pickupPointID;
        $this->products = $products;
    }
}