<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <?php
        require_once("funkcje.php");
        if (!checkIfLoggedIn()) {
            header("Location: index.php");
        }
    ?>

    <a href="index.php">Strona główna</a><br/>
    <form action="index.php" method="post">
        <input type="submit" name="wyloguj" value="wyloguj" />
    </form>
    <br/><br/>
    <span><?=$_SESSION["zalogowanyImie"] ?></span>

    <br/><br/>
    <form action="user.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Wrzuć zdjęcie na serwer</legend>
            <input type="file" name="fileToUpload" /><br/>
            <input type="submit" name="wyslijZdjecie" value="Wyślij zdjęcie"/>
        </fieldset>
    </form>
    <?php
    if (isSet($_POST['wyslijZdjecie'])) {
        uploadFile();
    }
    ?>
    <img src="zdjeciaUzytkownikow/zdjecie.jpg" alt="Twoje zdjęcie"/>

</body>
</html>