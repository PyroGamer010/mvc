<?php
class BookController
{
    private $book;

    public function __construct()
    {
        //Als de controller wordt geladen, wordt er een (leeg) Book gemaakt
        $this->book = new Book();
    }

    public function index()
    {
        //vraag alle boeken op
        $boekenArray = $this->book->showAll();
        //laad de view 'booklist' om de array te tonen
        include "views/bookList.php";
    }

    public function showBook($id)
    {
        if (!is_null($id))
        {
            $this->book->load($id);
        }
        $boek = $this->book;
        //laad de view 'booklist' om de array te tonen
        include 'views/bookDetails.php';
    }

    public function showNewBookForm()
    {
        include 'views/newBookForm.php';
    }

    public function newBook($titel, $auteur, $isbn)
    {
        $result = "";
        if (isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrf_token"]) 
        {
            if (strlen($titel) > 0 && strlen($auteur) > 0 && strlen($isbn) > 0)
            {
                //schoon de data op
                $this->book->title = htmlentities($titel);
                $this->book->author = htmlentities($auteur);
                $this->book->isbn = htmlentities($isbn);

                if($this->book->saveNew())
                {
                    $result = $this->book->title . " is toegevoegd.";
                }
                else 
                {
                    $result = "FOUT bij toevoegen " . $this->book->title;
                }
            }
            else 
            {
                $result = "Niet alle eigenschappen gevuld";
            }
        }
        
        include 'views/newBookResult.php';
    }

    public function deleteBook($id)
    {
        if (!is_null($id))
        {
            //laad het boek in dat moet worden verwijderd
            $this->book->load($id);
            //verwijder het boek
            if ($this->book->delete())
            {
                $result = "Boek met id {$id} is verwijderd.";
            }
            else
            {
                $result = "FOUT bij verwijderen boek met id {$id}";
            }
        }
        else 
        {
            $result = "Boek met id {$id} is niet gevonden.";
        }
        include 'views/deleteBookResults.php';
    }

    public function showUpdateForm($id)
    {
        if (!is_null($id))
        {
            //laad het boek in dat moet worden aangepast
            $this->book->load($id);
            //zet het boek in een object dat gebruikt wordt in de view
            $boek = $this->book;
            //laad de view
            include 'views/updateBookForm.php';
        }
    }

    public function updateBook($id, $titel, $auteur, $isbn)
    {
        $result = "";
        if (strlen($id) > 0 && strlen($titel) > 0 && strlen($auteur) > 0 && strlen($isbn) > 0)
        {
            //schoon de data op en zet de waarde in het boek
            $this->book->id = $id;
            $this->book->title = htmlentities($titel);
            $this->book->author = htmlentities($auteur);
            $this->book->isbn = htmlentities($isbn);
            if ($this->book->update())
            {
                $result = $this->book->title . " is aangepast.";
            }
            else
            {
                $result = "FOUT bij aanpassen " . $this->book->title;
            }
        }
        else
        {
            $result = "Niet alle eigenschappen gevuld";
        }
        include 'views/updateBookResults.php';
    }
}