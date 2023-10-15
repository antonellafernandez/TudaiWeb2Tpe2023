<?php

class LibraryView {
    public function showBooks($books, $authors) {
       $count = count($books);
       require 'templates/booksList.phtml';
    }

    public function showUpdateForm($book, $authors) {
        require 'templates/form_update_book.phtml';
    }

    public function showMessage($message) {
        require 'templates/message.phtml';
    }
}