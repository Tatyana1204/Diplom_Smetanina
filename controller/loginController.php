<?php
class LoginController extends BaseController
{
  function __construct()
  {
    parent::__construct();
    Session::init();
   
    // Session::destroy();
    $this->view->css = array('/public/css/reg.css');
  }
  public function Failed()
  {
    //просто какое-то значение чтобы переменная не была пустой
    $this->view->data = true;
    //вызываем функцию Index() для отрисовки страницы
    $this->Index();
  }
  public function getLog()
  {
    $this->model->getLog();
  }
  public function Index()
  {
    $this->view->render('login/reg');
  }

  public function Register()
  {
    $this->view->render('login/index');
  }
  public function confirmRegister()
  {
    if (
      isset($_POST["userName"]) && isset($_POST["userLastName"])
      && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["password"])
    ) {
      $userName = $_POST["userName"];
      $userLastName = $_POST["userLastName"];
      $userTel = $_POST["tel"];
      $userEmail = $_POST["email"];
      $userPass = $_POST["password"];

      if ($this->model->Register($userName, $userLastName, $userTel, $userEmail, $userPass))
        $this->view->render('login/success');
      else
        $this->view->render('login/error');
    } else {
      $this->view->render('login/error');
    }
  }

  function logout(){
    Session::destroy();
  }

 
}
