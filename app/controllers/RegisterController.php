<?php
namespace App\Controllers;
use Core\Controller;
use Core\Router;
use App\Models\Users;
use App\Models\Login;
use Core\H;
use Core\Session;

class RegisterController extends Controller {

  public function onConstruct(){           
    $this->view->setLayout('default');
  }

  public function loginAction($redirect = '') {
    $loginModel = new Login();
    if($this->request->isPost()) {
      // form validation
      $this->request->csrfCheck();
      $loginModel->assign($this->request->get());
      $loginModel->validator();
      if($loginModel->validationPassed()){
        $user = Users::findByUsername($_POST['username']);      
        if($user && password_verify($this->request->get('password'), $user->password)) {
          $remember = $loginModel->getRememberMeChecked();
          $user->login($remember);
          $redirect = $this->request->get('redirect_link');
          $redirect = preg_replace('/_/', '/', $redirect);
          Router::redirect($redirect);
        }  else {
          $loginModel->addErrorMessage('username','There is an error with your username or password');
        }
      }
    }
    $this->view->redirect = $redirect;
    $this->view->login = $loginModel;
    $this->view->displayErrors = $loginModel->getErrorMessages();
    $this->view->render('register/login');
  }

  public function logoutAction() {
    if(Users::currentUser()) {
      Users::currentUser()->logout();
    }
    Router::redirect('home');
  }

  public function registerAction() {
    $newUser = new Users();
    if($this->request->isPost()) {
      $this->request->csrfCheck();
      $newUser->assign($this->request->get(),Users::blackListedFormKeys);
      $newUser->confirm =$this->request->get('confirm');
      if($newUser->save()){
        Router::redirect('register/login');
      }
    }
    $this->view->newUser = $newUser;
    $this->view->displayErrors = $newUser->getErrorMessages();
    $this->view->render('register/register');
  }
}
