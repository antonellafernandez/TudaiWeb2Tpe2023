<?php 

class AuthorsView {
    function showAuthors ($authors, $books) {
        $count = count($authors);
        require 'templates/authorsList.phtml'; 
    }

    function showUpdateForm($author) {
        require 'templates/form_update_author.phtml';
    }
}