<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pracownicy</title>
</head>
<body>
<a href="form06_post.php">Dodaj pracownika</a><br/>
    <?php
        if (isset($_SESSION["DBMSG"])) {
            echo "<span>".$_SESSION["DBMSG"]."</span><br/>";
            unset($_SESSION["DBMSG"]);
        }
        
        $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
        if (!$link) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql = "SELECT * FROM pracownicy";
        $result = $link->query($sql);
        foreach ($result as $v) {
            echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
        }
        $result->free();
        $link->close();
    ?>
</body>
</html>