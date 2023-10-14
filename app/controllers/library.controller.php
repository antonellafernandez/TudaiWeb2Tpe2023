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
        header('Location: ' . BASE_URL);
    }

    function create() {
        $body = $this->getData();

        $title = $body['title'];
        $publication_date = $body['publication_date'];
        $id_author = $body['id_author'];
        $synopsis = $body['synopsis'];

        $id = $this->model->insertBook($title, $publication_date, $id_author, $synopsis);
        header('Location: ' . BASE_URL);

        $this->view->showMessage('El libro fue insertado exitosamente con id=' . $id . '.');
    }
    
    function update($id) {
        $book = $this->model->getBook($id);
        $this->view->showUpdateForm();
        
        if ($book) {
            $body = $this->getData();

            $title = $body['title'];
            $publication_date = $body['publication_date'];
            $id_author = $body['id_author'];
            $synopsis = $body['synopsis'];

            $this->model->updateBookData($id, $title, $publication_date, $id_author, $synopsis);
            header('Location: ' . BASE_URL);

            $this->view->showMessage('El libro con id=' . $id . ' ha sido modificado.');
        } else {
            $this->view->showMessage('El libro con id=' . $id . ' no existe.');
        }
    }

    function getData() {
        $title = $_POST['title'];
        $publication_date = $_POST['publication_date'];
        $id_author = $_POST['id_author'];
        $synopsis = $_POST['synopsis'];

        $body = [
            'title' => $title,
            'publication_date' => $publication_date,
            'id_author' => $id_author,
            'synopsis' => $synopsis
        ];

        return $body;
    }
}