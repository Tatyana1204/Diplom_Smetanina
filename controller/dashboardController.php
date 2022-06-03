<?php
class DashboardController extends BaseController{
    function __construct(){
        parent::__construct();
    }
    public function Products(){
        Session::init();
       
        if (Session::get('role') == 'user')
            header('location: ' . URL . '/profile');


        $this->view->categories = $this->model->getCategories();
        $this->view->products = $this->model->getProducts();
        $this->view->render('dashboard/index');
    }
    public function Categories(){
        Session::init();
       
        if (Session::get('role') == 'user')
            header('location: ' . URL . '/profile');


        $this->view->categories = $this->model->getCategories();
        $this->view->products = $this->model->getProducts();
        $this->view->render('dashboard/categories');
    }

    public function Cards()
    {
        $this->view->cards = $this->model->getCards();
        $this->view->render('dashboard/cards');
    }
    // ПРОДУКТЫ
    public function UpdateProduct(){
        $this->model->UpdateProduct();
    }

    public function AddProduct(){
       
       $this->model->AddProduct();
    }
    public function DeleteProduct(){
      
        $this->model->DeleteProduct();
    }

    // Категории

    public function UpdateCategory(){
        $this->model->UpdateCategory();
    }

    public function AddCategory(){
        $this->model->AddCategory();
    }
    public function DeleteCategory(){
        $this->model->DeleteCategory();
    }

    // ПОДАРОЧНЫЕ КАРТЫ
    public function UpdateCard(){
        $this->model->UpdateCard();
    }

    public function AddCard(){
       
       $this->model->AddCard();
    }
    public function DeleteCard(){
      
        $this->model->DeleteCard();
    }
}