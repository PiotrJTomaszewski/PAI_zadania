<?php
    session_start();
    if (isset($_SESSION["DBMSG"])) {
        echo "<span>".$_SESSION["DBMSG"]."</span><br/>";
        unset($_SESSION["DBMSG"]);
    }

    print <<< KONIEC
            <!DOCTYPE html>
            <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
            <body>
                <a href="form06_get.php">Lista pracowników</a>
                <form action="form06_redirect.php" method="POST">
                    <label for="id_prac">id_prac </label>
                    <input type="text" name="id_prac" id="id_prac">
                    <label for="nazwisko">nazwisko </label>
                    <input type="text" name="nazwisko" id="nazwisko">
                    <input type="submit" value="Wstaw">
                    <input type="reset" value="Wyczyść">
                </form>
            </body>
            </html>
        KONIEC;
?>