<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php
    
    if (isset(
            $_POST['nimi'],
            $_POST['puhelinnumero'],
            $_POST['email'],
            $_POST['viesti']
        )) 
    {
        $nimi = htmlspecialchars($_POST['nimi']);
        $puhelinnumero = htmlspecialchars($_POST['puhelinnumero']);
        $email = htmlspecialchars($_POST['email']);
        $viesti = htmlspecialchars($_POST['viesti']);

        if (empty($nimi) || empty($puhelinnumero) || empty($email) || empty($viesti)) {
            $_SESSION['virhe'] = "Kaikki kentät ovat pakollisia!";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['virhe'] = "Virheellinen sähköposti!";
        }

    };
    ?>

    <form class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2 class="text-center mt-3">Ota Yhteyttä</h2>
        <input class="my-2 mx-auto form-control" type="text" name="nimi" id="nimi" placeholder="Etu- ja sukunimi"
            required>
        <input class="my-2 mx-auto form-control" type="text" name="puhelinnumero" id="puhelinnumero"
            placeholder="Puhelinnumero" required>
        <input class="my-2 mx-auto form-control" type="email" name="email" id="email" placeholder="Sähköposti" required>
        <textarea class="my-2 mx-auto form-control" type="text" name="viesti" id="viesti" placeholder="Viesti"
            required></textarea>
        <button class="py-2 my-2 mx-auto btn btn-primary form-control align-self-center"
            type="submit"><span>Lähetä</span></button>
    </form>
    <?php if (isset($_SESSION['virhe'])) echo '<div class="alert alert-danger text-center" role="alert">' . $_SESSION['virhe'] . '</div>'; ?>
</body>
<link rel="stylesheet" href="tyyli.css">
</html>