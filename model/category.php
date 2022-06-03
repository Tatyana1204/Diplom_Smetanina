<?php
class Category
{
    function __construct($id, $title,$description,$img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->img = $img;
    }
}
