<?php

class AuthorModel {
    private $db;

    function __construct() {
        $host = DB_HOST;
        $dbname = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;
        $charset = DB_CHARSET;

        $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
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

    function deleteAuthorById($authorID) {
        $query = $this->db->prepare('DELETE FROM authors WHERE id_author = ?');
        $query->execute([$authorID]);
    }
}