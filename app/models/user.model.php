<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_library;charset=utf8', 'root', '');
    }

    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM users WHERE user = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }
}