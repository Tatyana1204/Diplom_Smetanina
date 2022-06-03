<?php
class CartController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        Session::init();
    }
    public function Index()
    {
        if (Session::get('role') == 'admin')
        header('location: ' . URL );
        
        $this->view->points = $this->model->getPickupPoints();
        $this->view->categories = $this->model->getCategories();
        $this->view->render('cart/index');
    }

    public function ConfirmOrder()
    {
        if (Session::get("user") != NULL){
             $this->model->ConfirmOrder();
        }
        else  echo json_encode(['status' => 'error', 'error' => 'user not logged' ]);
        // $this->model->ConfirmOrder();
    }

    public function Order($orderId)
    {
        $this->view->orderId = $orderId;
        $this->view->render('cart/order');
    }
    public function checkPromocode(){
     
        $this->model->checkPromocode($_POST["promocode"]);
      
    }
    public function confirm ()
    {
        $this->model->confirm();
    }
}
