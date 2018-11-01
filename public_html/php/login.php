<?php

$errorMSG = "";
// EMAIL
if (empty($_POST["email"]) || empty($_POST["pass"])) {
    echo $errorMSG .= "Datos Erroneos";
} else {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    ValidaDatos($email, $pass);
}

function ValidaDatos($email, $pass) {
    if ($email == "mail@mail.com" && $pass == "1234") {
        echo "success";
    } else {
        echo "Datos erróneos ¯\_(シ)_/¯";
    }
}

?>