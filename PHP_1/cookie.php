<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <a href="index.php">Wstecz</a>
    <br/><br/>
    <?php
        require_once("funkcje.php");
        if(isSet($_GET["utworzCookie"]) && isSet($_GET["utworzCookie"]) && $_GET["czas"] != "") {
            setcookie("ciasteczko", "TEST", time() + $_GET["czas"], "/");
            echo "Ustawiono ciasteczko";
        }
    ?>

</body>
</html>