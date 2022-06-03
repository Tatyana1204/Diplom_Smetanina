<?php
class ProfileController extends BaseController
{
    function __construct()
    {
        parent::__construct();
      //  $this->view->css = array('/public/css/my-slider.css', '/public/css/index.css');
      Session::init();
   
    }
    
    public function Index()
    {
        //здесь мы выводим на стартовую страницу все, что хотим с помощью функций
        // проверили, выводит ли он массив категорий из БД
        //print_r($this->model->getCategories());
        $this->view->orders = $this->model->getOrders();
        $this->view->categories = $this->model->getCategories();
        $this->view->render('profile/index');
    }
}
