<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);


    try {
        // this allows me to access code inside this file
        require_once"../includes/dbh.inc.php";

        // For named paremeter
        $query = "DELETE FROM users where username = :username AND email = :email;";

        $statement = $pdo ->prepare($query);


        // For non named parameter
        // $statement -> execute(params: array($username, $password, $email));

        // For named parameter
        $statement -> bindParam(":username", $username);
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