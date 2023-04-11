<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require 'inc/config.inc.php';
    require_once 'models/Book.php';
    require_once 'controllers/BookController.php';

    //laad de Bookcontroller
    $ctr = new BookController();

    //VERWIJDEREN
    if (isset($_GET['verwijder']))
    {
        $ctr->deleteBook($_GET['verwijder']);
    }

    if (isset($_GET['voegtoe']))
    {
        if (isset($_POST['knop']))
        {
            $ctr->newBook($_POST['naam'], $_POST['auteur'], $_POST['isbn']);
        }
        else 
        {
            $ctr->showNewBookForm($_GET['voegtoe']);
        }
    }

    if (isset($_GET['pasaan']))
    {
        //als het aanpasformulier verstuurd is, de nieuwe gegevens verwerken
        if (isset($_POST['aanpasknop']))
        {
            $ctr->updateBook($_POST['id'], $_POST['naam'], $_POST['auteur'], $_POST['isbn']);
        }
        //anders het formulier met oude gegevens tonen
        else
        {
            $ctr->showUpdateForm($_GET['pasaan']);
        }
    }

    if (isset($_GET['id']))
    {
        //toon de juiste boek
        $ctr->showBook($_GET['id']);
    }
    else 
    {
        //vraag alle boeken op
        $ctr->index();
    }    

?>
</body>
</html>