<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function login() {
        $this->view->showLogin();
    }

    public function auth() {
        $username = $_POST['user'];
        $password = $_POST['password'];

        $user = $this->model->getByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Lo sentimos, el usuario ingresado no es válido.');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }
}