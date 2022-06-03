<?php

class App
{
    // чтобы по дефолту отображалась главная страница
    const default_path = 'index';

    private $file;

    function __construct()
    {
       
       $url = $this->getUrl();
        //если имя файла в url указано неправильно 
        // или имя метода в url указано неправильно returns false
        if(!$this->IsCorrectPath($url)){
            // открывает страницу ошибки, если путь неверный 
            require "controller/errorController.php";
            $controller = new ErrorController();
            $controller->Index();
            return false;
        }
        
        require_once $this->file;
     
        $controllerName = $url[0].'Controller';
        $controller = new $controllerName;
      
        $controller->loadModel($url[0]);
    // проверяем, есть ли в массиве пути что-то еще(метод, аргументы)
        if (isset($url[2]) && method_exists($controller, $url[1])) {
            // вызываем этот прописанный заранее метод  и аргументы
            $controller->{$url[1]}($url[2]);
    // проверяем, есть ли в массиве пути только метод
        } elseif (isset($url[1]) && method_exists($controller, $url[1])) {
             // вызываем этот прописанный заранее метод 
            $controller->{$url[1]}();
            //иначе открываем просто страницу
        } else {
            $controller->Index();
        }
        
    }

    private function getUrl(){
        $url = isset($_GET['url']) ? $_GET['url'] : self::default_path;
        // проверяет есть ли у нас в строке адресной, есть такой путь или нет, и если нет, то окрывает по дефолту главную страницу
        // и из этой строки он делает массив
        $url = explode('/',trim($url, '/'));
        $url[0]= $url[0];
        // print_r($url);
        return $url;
    }

    private function IsCorrectPath(array $url){
        // правильно ли написан путь
        $this->file =  "controller/" . $url[0] . "Controller.php";
        if (!file_exists($this->file)) return false;
        if (!isset($url[1])) return true;

        $controllerName = $url[0].'Controller';
        require_once $this->file;
        return method_exists(new  $controllerName, $url[1]);
    }
}
