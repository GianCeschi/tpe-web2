<?php

class AuthHelper {
     /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function checkLoggedIn() {
        if(session_status()!= PHP_SESSION_ACTIVE){  //SI NO ESTA INICIADA LA SESSION LE HACE UN SESSION START();
            session_start();
        }
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
    } 
}
