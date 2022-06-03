<?php
class ProcessedController extends BaseController{
    function __construct(){
        parent::__construct();
        Session::init();
       
    }
    public function Index(){
        $this->view->render('processed/index');
    }
}