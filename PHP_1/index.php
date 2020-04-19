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
    ?>

    <?php
        // if(isSet($_POST["zaloguj"])){ 
        //     $login = $_POST["login"];
        //     $haslo = $_POST["haslo"];

        //     if (checkLogin($osoba1, $login, $haslo)) {
        //         login($osoba1);
        //     }
        //     else if (checkLogin($osoba2, $login, $haslo)) {
        //         login($osoba2);
        //     } 
            // echo "Przesłany login: $login<br/>";
            // echo "Przesłane hasło: $haslo";
        // }

        if (isSet($_POST["wyloguj"])) {
            $_SESSION["zalogowany"] = 0;
        }
    ?>
    <a href="user.php">Moje konto</a><br/>

    <h1><?php echo "Nasz system" ?></h1>

    <form action="logowanie.php" method="post">
        <fieldset>
        <legend>Logowanie:</legend>
        <label for="login">Login: </label><input type="text" id="login" name="login"/><br/>
        <label for="haslo">Hasło: </label><input type="password" id="haslo" name="haslo"/><br/>
        <input type="submit" name="zaloguj" value="Zaloguj">
        </fieldset>
    </form>

    <br/><br/>
    <div>
    <?php
        if ($_COOKIE["ciasteczko"]) {
            echo "Jest ciasteczko!, ma wartość " . $_COOKIE['ciasteczko'];
        } else {
            echo "Nie ma ciasteczka :(";
        }
    ?>
    </div>
    <br/>
    <form action="cookie.php" method="get">
        <fieldset>
        <legend>Ustawianie ciasteczka</legend>
        <label for="czas">Czas istnienia cookie w sekundach</label>
        <input type="number" name="czas" id="czas" /><br/>
        <input type="submit" name="utworzCookie" value="Zatwierdź"/>
    </form>

</body>
</html>