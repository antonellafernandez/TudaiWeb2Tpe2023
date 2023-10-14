<?php

require_once './app/models/author.model.php';
require_once './app/views/author.view.php';
require_once './app/helpers/auth.helper.php';

class AuthorController {
    private $model;
    private $view;
    private $authHelper;
    
    public function __construct() {
        AuthHelper::verify();
        
        $this->model = new AuthorModel();
        $this->view = new AuthorsView();
        $this->authHelper = new AuthHelper();
    }

    public function showAuthor() {
        $authors = $this->model->getAuthors();
        $this->view->showAuthors($authors);
    }

    public function addAuthor() {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $this->model->insertAuthor($name);
            header('Location: ' . BASE_URL . '/mostrarAutor');
        }
    }

    public function editAuthor($authorID) {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $this->model->updateAuthorName($authorID, $name);
            header("Location: " . BASE_URL . "/mostrarAutor");
            exit;
        } else {
            $author = $this->model->getAuthorById($authorID);
            $this->view->showUpdateForm($author);
        }
    }
    
    public function showBooks_Author($authorID) {
        $books_Author = $this->model->getBooksByAuthorID($authorID);

        // Llama a la función de vista para mostrar los libros del autor
        $this->view->renderAuthorBooks($authorID, $books_Author);
    }
    
    public function deleteAuthorById($authorID) {
        $this->model->deleteAuthorById($authorID); 
    }
}