<!DOCTYPE html>
<body>
    <h3>Boek Aanpassen:</h3>
    <form method="post" action="">
        <p><input type="hidden" name="id" value="<?php echo $boek->id; ?>"></p>
        <p>Titel:<input type="text" name="naam" required value="<?php echo $boek->title; ?>"></p>
        <p>Auteur:<input type="text" name="auteur" required value="<?php echo $boek->author; ?>"></p>
        <p>ISBN:<input type="text" name="isbn" required value="<?php echo $boek->isbn; ?>"></p>
        <p><input type="submit" name="aanpasknop" value="PAS AAN"></p>
    </form>
</body>
</html>