<?php

class AuthorModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_library;charset=utf8', 'root', '');
    }

    function getAuthors() {
        $query = $this->db->prepare('SELECT * FROM authors');
        $query->execute();

        $autores = $query->fetchAll(PDO::FETCH_OBJ);

        return $autores;
    }

    function getAuthorById($authorID) {
        $query = $this->db->prepare('SELECT * FROM authors WHERE id_author = ?');
        $query->execute([$authorID]);

        $author = $query->fetch(PDO::FETCH_OBJ);

        return $author;
    }

    public function updateAuthorName($authorID, $name) {
        $query = $this->db->prepare('UPDATE authors SET name = ? WHERE id_author = ?');
        $query->execute([$name, $authorID]);
    }

    function insertAuthor($name) {
        $query = $this->db->prepare('INSERT INTO authors (name) VALUES (?)');
        $query->execute([$name]);

        return $this->db->lastInsertId();
    }

    public function getBooksByAuthorID($authorID) {
        $query = $this->db->prepare('SELECT a.* FROM books a INNER JOIN authors b ON a.FK_id_authors = b.id WHERE b.id = ?');
        $query->execute([$authorID]);
        $books_Author = $query->fetchAll(PDO::FETCH_OBJ);

        return $books_Author;
    }

    function deleteAuthorById($authorID) {
        $query = $this->db->prepare('DELETE FROM authors WHERE id_author = ?');
        $query->execute([$authorID]);

        if ($query->rowCount() > 0) {
            // La eliminación fue exitosa
            echo "Autor eliminado correctamente.";
        } else {
            // No se encontró un autor con el ID especificado
            echo "No se encontró un autor con el ID especificado: " . $authorID;
        }
    }
}