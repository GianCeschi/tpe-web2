<?php
require_once 'views/auth.view.php';
require_once 'models/user.model.php';

class AuthController {
    private $view;
    private $model;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showFormLogin() {
        $this->view->showFormLogin();
    }

    public function validateUser() {
        // toma los datos del form
        $nameUser = $_POST['nameUser'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // busco el usuario por email
        $user = $this->model->getUserByEmail($email);
      
        // verifico que el usuario existe y que las contraseñas son iguales
        if ($user && password_verify($password, $user->contraseña)) {  //$user->contraseña(porque es como esta en la base de datos).

            // inicio una session para este usuario
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;

            header("Location: " . BASE_URL. "admin"); // Lo mando a la seccion admin q es donde puede administrar.
        } else {
            // si los datos son incorrectos muestro el form con un error.
           $this->view->showFormLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

}
