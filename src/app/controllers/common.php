<?php
namespace src\app\controllers;
use src\main\controller AS Core;

class Common extends Core {

    function login() {
      $data['title'] = 'Login';
      $this->render('common/login', $data, 2);
    }

    function auth() {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $account = $this->model('Common');
      $account->auth($username, $password);
    }

    function logout() {
      session_destroy();
  		header("Location: ".HOME); exit();
    }

    function dashboard() {
      $data['title'] = 'Dashboard';
      $this->render('common/dashboard', $data);
    }

}
