<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Book 
{
    public $id      = NULL;
    public $title   = "";
    public $author  = "";
    public $isbn    = "";


    public function load($id)
    {
        //zorg dat de databaseverbinding gebruikt kan worden
        global $mysqli;
        //zoek de gegevens in de database
        $query = "SELECT * FROM mvc_boeken WHERE id = " . $id;
        //voor de query uit en vang het resultaat op
        $result = mysqli_query($mysqli, $query);
        //is er een boek met dit id
        if (mysqli_num_rows($result) == 1)
        {
            //lees de data van het boek uit
            $row = mysqli_fetch_array($result);
            //vull de properties van het object
            $this->id       = $id;
            $this->title    = $row['title'];
            $this->author   = $row['author'];
            $this->isbn     = $row['isbn'];
        }
        else 
        {
            //er ging wat mis
            throw new Exception("Kan het boek met" . $id . "niet vinden.");
        }
    }

    public function saveNew()
    {
        //zorg dat de databaseverbinding gebruikt kan worden
        global $mysqli;
        //schoon de data op
        $this->title    = mysqli_real_escape_string($mysqli, $this->title);
        $this->author   = mysqli_real_escape_string($mysqli, $this->author);
        //maak de query
        $query = "INSERT INTO mvc_boeken (title, author, isbn) ";
        $query .= "VALUES ('{$this->title}', '{$this->author}', '{$this->isbn}')";
        //voer de query uit
        if (mysqli_query($mysqli, $query))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function showALL()
    {
        global $mysqli;

        //maak een Array van alle boeken
        $boeken = Array();
        //lees de id's van alle boeken
        $result = mysqli_query($mysqli, "SELECT id FROM mvc_boeken ORDER BY id");
        //zijn er boeken gevonden
        if (mysqli_num_rows($result) > 0)
        {
            //voeg alle boeken toe aan de array
            while ($row = mysqli_fetch_array($result))
            {
                $bookAdd    = new Book();
                $bookAdd->load($row['id']);
                $boeken[]   = $bookAdd;
            }
        }
        return $boeken;
    }
}
