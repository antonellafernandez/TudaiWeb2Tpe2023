<?php
require_once 'config.php';

require_once './app/controllers/auth.controller.php';
require_once './app/controllers/author.controller.php';
require_once './app/controllers/library.controller.php';

$action = 'listarLibros';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listarLibros         ->  libraryController->get();
// agregarLibro         ->  libraryController->create(); 
// eliminarLibro/:ID    ->  libraryController->delete($id); 
// editarLibro/:ID      ->  libraryController->update($id);
// aboutLibro/:ID       ->  libraryController->showAuthor($id); VER ESTO!
// listarAutores        ->  libraryController->showAuthor();
// agregarAutor         ->  libraryController->addAuthor(); 
// eliminarAutor/:ID    ->  libraryController->removeAuthor($id); 
// editarAutor/:ID      ->  libraryController->editAuthor($id);
// ListarCategoria/:ID  ->  libraryController->showAuthor($id);
// login                ->  authContoller->login();
// logout               ->  authContoller->logout();
// auth                 ->  authContoller->auth();

$params = explode('/', $action);

switch ($params[0]) {
    case 'listarLibros':
        $controller = new LibraryController();
        $controller->get();
        break;
    case 'agregarLibro':
        $controller = new LibraryController();
        $controller->create();
        break;
    case 'eliminarLibro':
        $controller = new LibraryController();
        $controller->delete($params[1]);
        break;
    case 'editarLibro':
        $controller = new LibraryController();
        $controller->update($params[1]);
        break;
    case 'editarAutor':
        $controller = new AuthorController();
        if (isset($params[1])) {
            $authorID = $params[1];
            $controller->editAuthor($authorID);
        }
        break;
    case 'mostrarAutor':
        $controller = new AuthorController();
        $controller->showAuthor();
        break;
    case 'agregarAutor':
        $controller = new AuthorController();
        $controller->addAuthor();
        break;
    case 'eliminarAutor':
        $controller = new AuthorController();
        if (isset($params[1])) {
            $authorID = $params[1];
            $controller->deleteAuthorById($authorID);
        }
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo "ERROR 404 Page Not Found";
        break;
}