<?php
class Products
{
    function __construct($productID, $categoryID, $img, $title, $description, $ML, $price, $sale)
    {
        $this->productID = $productID;
        $this->categoryID = $categoryID;
        $this->img = URL . '/'.$img;
        $this->title = $title;
        $this->description = $description;
        $this->ML = $ML;
        $this->price = $price;
        $this->sale = $sale;
    }
}

