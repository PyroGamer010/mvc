<?php
//zijn er boeken te weergeven
if (count($boekenArray) > 0)
{
    //start de tabel
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Titel</th>";
    echo "<th>Auteur</th>";
    echo "<th>ISBN</th>";
    echo "<th>Details</th>";
    echo "<th>Pas aan</th>";
    echo "<th>Verwijder</th>";
    echo "</tr>";
    //lees alle boeken uit
    foreach ($boekenArray as $boek)
    {
        echo "<tr>";
        echo "<td>" . $boek->id . ": </td>";
        echo "<td>" . $boek->title . "</td>";
        echo "<td>" . $boek->author . "</td>";
        echo "<td>" . $boek->isbn . "</td>";
        echo "<td><a href='?id={$boek->id}'>details</a></td>";
        echo "<td><a href='?pasaan={$boek->id}'>pas aan</a></td>";
        echo "<td><a href='?verwijder={$boek->id}'>verwijder</a></td>";
        echo "</tr>";
    }
    
    echo "<td><a href='?voegtoe={$boek->id}'>Voeg Toe</a></td>";
    echo "</table>";
}
else 
{
    echo "<P>Geen boeken gevonden.</P>";
}