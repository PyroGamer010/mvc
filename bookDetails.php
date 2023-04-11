<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Boek details:</h1>
<?php

    require 'inc/config.inc.php';
    require_once 'models/Book.php';
    require_once 'controllers/BookController.php';

    echo "ID: " . $book->id . "<br>";
    echo "Titel: " . $book->title . "<br>";
    echo "Auteur: " . $book->author . "<br>";
    echo "ISBN: " . $book->isbn . "<br>";

?>
</body>
</html>