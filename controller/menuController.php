<?php
class MenuController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->view->css = array('/public/css/menu.css');
        Session::init();
    }
    public function Categorize($category)
    {

        $this->view->products = $this->model->getProducts($category);
        $this->view->categories = $this->model->getCategories();
        $this->view->render('menu/index');
    }
    public function getProd($productID)
    {

        $this->view->categories = $this->model->getCategories();
        $this->view->prod = $this->model->getProd($productID);
        $this->view->render('menu/prod');
    }
    public function getCards()
    {


        // print_r($this->model->getCards());
        $this->view->categories = $this->model->getCategories();
        $this->view->cards = $this->model->getCards();
        $this->view->render('menu/cards');
    }
}
