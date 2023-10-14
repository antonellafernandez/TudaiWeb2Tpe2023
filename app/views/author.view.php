<?php 

class AuthorsView {
    function showAuthors ($authors) {
        $count = count($authors);
        require 'templates/authorsList.phtml'; 
    }

    function showUpdateForm($author) {
        require 'templates/form_update_author.phtml';
    }

    public function renderAuthorBooks($authorID, $books_Author) {
        echo "Author ID: $authorID<br>";
        echo "<ul>";
        foreach ($books_Author as $book) {
            echo "<li>{$book->titulo}</li>";
        }
        echo "</ul>";
    }
}