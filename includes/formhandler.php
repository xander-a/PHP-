<?php

// People can't access the main link
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // getting the data and storing it to variable
    // using htmlspecialchars to sanitize data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["subject"]);
    $favoriteCar = htmlspecialchars($_POST["favoriteCar"]);

    
    if (empty($name)) {
        exit();
        header("Location: ../index.php");
    }

    echo $name;
    echo $email;
    echo $password;
    echo $favoriteCar;

    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
