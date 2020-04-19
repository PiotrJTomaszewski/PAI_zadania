<?php
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

function checkLogin($osoba, $login, $haslo) {
    if (isSet($login) && isSet($haslo)) {
        return ($login == $osoba->login && $haslo == $osoba->haslo);
    } return false;

}

function login($osoba) {
    $_SESSION["zalogowanyImie"] = $osoba->imieNazwisko;
    $_SESSION["zalogowany"] = 1;
}

function checkIfLoggedIn() {
    return (isSet($_SESSION["zalogowany"]) && $_SESSION["zalogowany"] == 1);
}

function uploadFile() {
    $currentDir = getcwd();
    $uploadDirectory = "/zdjeciaUzytkownikow/";
    $fileName = $_FILES['fileToUpload']['name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $acceptableTypes = array('image/png', 'image/jpeg', 'image/JPEG', 'image/PNG');
    if (in_array($fileType, $acceptableTypes)) {
        $uploadPath = $currentDir . $uploadDirectory . $fileName;
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            echo "Zdjęcie zostało załadowane na serwer<br/>";
        }
    }
}
?>