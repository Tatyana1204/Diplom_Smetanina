<?php

class BaseController{
    function __construct()
    {
        // создание экземпляра класса view
        $this->view = new View();
    }
//загрузка файла модели
//сюда передается имя открываемых файлов и он их открывает
// name - то, что вводится в пути в адресной строке 
// функция, чтобы не прописывать путь к страницам вручную
    public function LoadModel($name){
        $path = "model/".$name."Model.php";
        if (file_exists($path)){
            require $path;
            $modelName = $name . "Model";
            $this->model = new $modelName();
        }

    }
}