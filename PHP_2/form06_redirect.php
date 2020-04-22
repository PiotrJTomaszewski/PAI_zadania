<?php
    session_start();
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if (isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko'])) {
            $sql = "INSERT INTO pracownicy(id_prac, nazwisko) VALUES (?,?)";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
            $result = $stmt->execute();

            if ($result) {
                $_SESSION["DBMSG"] = "Query executed successfully";
                header("Location: form06_get.php");
            } else {
                $_SESSION["DBMSG"] = "Query failed: ".mysqli_error($link);
                header("Location: form06_post.php");
            }
            $stmt->close();
    } else {
        $_SESSION["DBMSG"] = "Query failed: Incorrect data";
        header("Location: form06_post.php");
    }
    $result->free();
    $link->close();
?>