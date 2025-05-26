<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello world!</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="kayttaja">Käyttäjätunnus:</label>
        <input type="text" name="kayttaja" required><br>

        <label for="salasana">Salasana:</label>
        <input type="password" name="salasana" required><br>

        <input type="submit" value="Kirjaudu">
    </form>
    <?php 
        if(isset($_POST['kayttaja']) && isset($_POST['salasana'])) {
            $kayttaja = htmlspecialchars($_POST['kayttaja']);
            $salasana = htmlspecialchars($_POST['salasana']);

            // Tarkistetaan käyttäjätunnus ja salasana
            if ($kayttaja === 'admin' && $salasana === 'salasana') {
                session_start();
                $_SESSION['autot'] = [];
                header("Location: lista.php"); // CHANGE ME!
                exit;
            } else {
                echo "Virheellinen käyttäjätunnus tai salasana";
            }
        }
    ?>
</body>
</html>