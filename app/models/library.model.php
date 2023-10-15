<?php

    class LibraryModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_library;charset=utf8', 'root', '');
    }

    function getBooks() {
        $query = $this->db->prepare('SELECT * FROM books');
        $query->execute();

        $books = $query->fetchAll(PDO::FETCH_OBJ);

        return $books;
    }

    function getBook($id) {
        $query = $this->db->prepare('SELECT * FROM books WHERE id_book = ?');
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }

    function insertBook($title, $publication_date, $id_author, $synopsis) {
        $query = $this->db->prepare('INSERT INTO books (title, publication_date, id_author, synopsis) VALUES (?,?,?,?)');
        $query->execute([$title, $publication_date, $id_author, $synopsis]);

        return $this->db->lastInsertId();
    }

    function deleteBook($id) {
        $query = $this->db->prepare('DELETE FROM books WHERE id_book = ?');
        $query->execute([$id]);
    }

    function updateBookData($id, $title, $publication_date, $id_author, $synopsis) {
        $query = $this->db->prepare('UPDATE books SET title = ?, publication_date = ?, id_author = ?, synopsis = ? WHERE id_book = ?');
        $query->execute([$title, $publication_date, $id_author, $synopsis, $id]);
    }
}