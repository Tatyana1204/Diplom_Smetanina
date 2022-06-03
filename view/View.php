<?php
class View{
    public function render($name){
        require "view/header.php";
        require 'view/' . $name . '.php';
    
    }
}