<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirjaudu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>


<body>
    <form class="container mt-4" method="POST" action="login.php">
        <div class="w-50 mx-auto">
            <label for="kayttaja">Käyttäjätunnus:</label>
            <input class="form-control" type="text" name="kayttaja" required><br>
        </div>

        <div class="w-50 mx-auto">
            <label for="salasana">Salasana:</label>
            <input class="form-control" type="password" name="salasana" required><br>
        </div>

        <div class="w-50 mx-auto">
            <input class="btn btn-primary w-50" type="submit" value="Kirjaudu">
        </div>

    </form>
    <?php

    if (isset($_POST['kayttaja']) && isset($_POST['salasana'])) {
        $kayttaja = htmlspecialchars($_POST['kayttaja']);
        $salasana = htmlspecialchars($_POST['salasana']);

        // Tarkistetaan käyttäjätunnus ja salasana
        if ($kayttaja === 'admin' && $salasana === 'salasana') {
            session_start();
            $_SESSION['kirjautunut'] = true;
            $_SESSION['kayttaja'] = 'admin';
            header('Location: index.php');
        } else {
            echo "Virheellinen käyttäjätunnus tai salasana";
        }
    }
    ?>
</body>
<link rel="stylesheet" href="tyyli.css">

</html>