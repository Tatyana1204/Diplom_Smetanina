<?php

class BaseModel{
//создаем экземпляр класса database
    function __construct(){
        $this->db = new DataBase();
    }
}