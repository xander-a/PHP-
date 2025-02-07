<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);


    try {
        // this allows me to access code inside this file
        require_once"../includes/dbh.inc.php";

        // For named paremeter
        $query = "UPDATE users SET username = :username, password = :password, email = :email where id = 6;";

        $statement = $pdo ->prepare($query);

        // For named parameter
        $statement -> bindParam(":username", $username);
        $statement -> bindParam(":password", $password);
        $statement -> bindParam(":email", $email);
        $statement -> execute();

        // not require but good to do. Free the resources. Not submit anything
        $pdo = null;
        $statement = null;

        header ("Location: index.php");

        die();

    } catch (PDOException $e) {
        die("Query failed: ".$e->getMessage());
    }
}else {
    header("Location: ../index.php");
}