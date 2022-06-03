<?php
class IndexController extends BaseController{
    function __construct(){
        parent::__construct();
        $this->view->css = array('/public/css/my-slider.css','/public/css/index.css');
        Session::init();
        // print_r(md5('admin'));
       
    }
    public function Index(){
        //здесь мы выводим на стартовую страницу все, что хотим с помощью функций
        // проверили, выводит ли он массив категорий из БД
        //print_r($this->model->getCategories());
        $this->view->categories = $this->model->getCategories();
        $this->view->render('index/index');
    }
    public function Categorize($category){
        //здесь мы выводим на стартовую страницу все, что хотим с помощью функций
        // проверили, выводит ли он массив категорий из БД
        //print_r($this->model->getCategories());
        $this->view->products = $this->model->getProducts($category);
        $this->view->categories = $this->model->getCategories();
        $this->view->render('menu/index');
    }
}