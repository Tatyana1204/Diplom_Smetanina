<?php
class Cards
{
    function __construct($id, $title,$img , $description,$price, $promocode)
    {
        $this->Id = $id;
        $this->title = $title;
        $this->img = URL . '/'.$img;
        $this->description = $description;
        $this->price = $price;
        $this->promocode = $promocode;
    }
}