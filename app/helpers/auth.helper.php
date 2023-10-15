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
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();

        // Lista de acciones permitidas sin autenticación
        $allowedActions = ['listarLibros', 'mostrarAutor'];
        $currentAction = !empty($_GET['action']) ? $_GET['action'] : 'listarLibros';

        // Verificar si la acción actual no requiere autenticación
        if (!isset($_SESSION['USER_ID']) && !in_array($currentAction, $allowedActions)) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
}