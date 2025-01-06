<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Setting up storage for inputs
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);


    try {
        // this allows me to access code inside this file
        require_once"../includes/dbh.inc.php";

        // For non named parameter
        // $query = "INSERT INTO users(username, password, email) VALUES(?, ?, ?);";

        // For named paremeter
        $query = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email);";

        $statement = $pdo ->prepare($query);


        // For non named parameter
        // $statement -> execute(params: array($username, $password, $email));

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

        // Exit - use if theres no connection inside
        //Die - use if theres connection

    } catch (PDOException $e) {
        die("Query failed: ".$e->getMessage());
    }
}else {
    header("Location: ../index.php");
}