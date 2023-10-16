<?php

class AuthHelper {
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AuthHelper::init();

        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_USERNAME'] = $user->user;

        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();

        // Desloguea si han pasado más de cinco minutos (300 segundos) de inactividad
        if (isset($_SESSION['USER_ID']) && $_SESSION['USER_ID']) {
            if (time() - $_SESSION['LAST_ACTIVITY'] > 300) {
                AuthHelper::logout();
            }

            $_SESSION['LAST_ACTIVITY'] = time();
        }

        // Lista de acciones permitidas sin autenticación
        $allowedActions = ['listarLibros', 'mostrarAutor'];
        $currentAction = !empty($_GET['action']) ? $_GET['action'] : 'listarLibros';

        // Verificar si la acción actual no requiere autenticación
        if (!isset($_SESSION['USER_ID']) && !in_array($currentAction, $allowedActions)) {
            header('Location: ' . LOGIN);
            die();
        }
    }
}