<?php

session_start();
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token

?>
<!DOCTYPE html>
<body>
    <h3>Boek Toevoegen:</h3>
    <form method="post" action="">
        <p><input type="hidden" name="csrf_token" value="<?php echo $token; ?>"></p>
        <p>Titel:<input type="text" name="naam" required></p>
        <p>Auteur:<input type="text" name="auteur" required></p>
        <p>ISBN:<input type="text" name="isbn" required></p>
        <p><input type="submit" name="knop" value="VOEG TOE"></p>
    </form>
</body>
</html>