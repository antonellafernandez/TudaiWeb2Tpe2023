<?php

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_library');
define('DB_CHARSET', 'utf8');

// Rutas
define("BASE_URL", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/');

define("LOGIN", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/login');
define("LOGOUT", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/logout');

define("LIBROS", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/listarLibros');
define("AUTORES", 'http://' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/mostrarAutor');