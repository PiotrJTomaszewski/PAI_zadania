<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <?php
        class Osoba {
            public $login;
            public $haslo;
            public $imieNazwisko;
        }

        $osoba1 = new Osoba;
        $osoba1->login = "adam";
        $osoba1->haslo = "adam2020";
        $osoba1->imieNazwisko = "Adam Kowalski";

        $osoba2 = new Osoba;
        $osoba2->login = "agata";
        $osoba2->haslo = "2020agata";
        $osoba2->imieNazwisko = "Agata Nowak";
    ?>

    <?php
        require_once("funkcje.php");
        if(isSet($_POST["zaloguj"])){ 
            $login = $_POST["login"];
            $haslo = $_POST["haslo"];

            if (checkLogin($osoba1, $login, $haslo)) {
                login($osoba1);
                header("Location: user.php");
            }
            else if (checkLogin($osoba2, $login, $haslo)) {
                login($osoba2);
                header("Location: user.php");
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    ?>
</body>
</html>