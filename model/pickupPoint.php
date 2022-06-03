<?php

class PickupPoint{

    public function __construct($id, $title, $address)
    {
        $this->id = $id;
        $this->title = $title;
        $this->address = $address;
    }
}