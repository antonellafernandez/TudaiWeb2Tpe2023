<?php
require_once './app/models/author.model.php';
require_once './app/models/library.model.php';
require_once './app/views/library.view.php';
require_once './app/helpers/auth.helper.php';

class LibraryController {
    private $author_model;
    private $model;
    private $view;

    public function __construct() {
        AuthHelper::verify();

        $this->author_model = new AuthorModel();
        $this->model = new LibraryModel();
        $this->view = new LibraryView();
    }

    function get() {
        $books = $this->model->getBooks();
        $authors = $this->author_model->getAuthors();

        foreach ($books as $book) {
            $author = $this->author_model->getAuthorById($book->id_author);
            $book->author = $author;
        }

        $this->view->showBooks($books, $authors);
    }

    function delete($id) {
        $this->model->deleteBook($id);
        header('Location: ' . BASE_URL . 'listarLibros');
    }

    function create() {
        if (isset($_POST['title']) && isset($_POST['publication_date']) && isset($_POST['id_author']) && isset($_POST['synopsis'])) {
            $title = $_POST['title'];
            $publication_date = $_POST['publication_date'];
            $id_author = $_POST['id_author'];
            $synopsis = $_POST['synopsis'];

            $this->model->insertBook($title, $publication_date, $id_author, $synopsis);
            header('Location: ' . BASE_URL . 'listarLibros');
        }
    }

    function update($id) {
        $book = $this->model->getBook($id);
        $authors = $this->author_model->getAuthors();

        $this->view->showUpdateForm($book, $authors);

        if (isset($_POST['title']) && isset($_POST['publication_date']) && isset($_POST['id_author']) && isset($_POST['synopsis'])) {
            $title = $_POST['title'];
            $publication_date = $_POST['publication_date'];
            $id_author = $_POST['id_author'];
            $synopsis = $_POST['synopsis'];

            $this->model->updateBookData($id, $title, $publication_date, $id_author, $synopsis);
            header('Location: ' . BASE_URL . 'listarLibros');
        }
    }
}