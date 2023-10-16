<?php

require_once './app/models/author.model.php';
require_once './app/models/library.model.php';
require_once './app/views/author.view.php';
require_once './app/helpers/auth.helper.php';

class AuthorController {
    private $library_model;
    private $model;
    private $view;
    
    public function __construct() {
        AuthHelper::verify();
        
        $this->library_model = new LibraryModel();
        $this->model = new AuthorModel();
        $this->view = new AuthorsView();
    }

    public function showAuthor() {
        AuthHelper::verify();

        $authors = $this->model->getAuthors();
        $books = $this->library_model->getBooks();

        $this->view->showAuthors($authors, $books);
    }

    public function addAuthor() {
        AuthHelper::verify();

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $this->model->insertAuthor($name);
            header('Location: ' . AUTORES);
        }
    }

    public function editAuthor($authorID) {
        AuthHelper::verify();

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $this->model->updateAuthorName($authorID, $name);
            header("Location: " . AUTORES);
            exit;
        } else {
            $author = $this->model->getAuthorById($authorID);
            $this->view->showUpdateForm($author);
        }
    }
    
    public function showBooks_Author($authorID) {
        AuthHelper::verify();

        $books_Author = $this->model->getBooksByAuthorID($authorID);
        // VER
    }
    
    public function deleteAuthorById($authorID) {
        AuthHelper::verify();
        
        $this->model->deleteAuthorById($authorID);
        header('Location: ' . AUTORES);
    }
}