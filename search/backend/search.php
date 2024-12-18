<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST["usersearch"];

    try {
        // this allows me to access code inside this file
        require_once "../../includes/dbh.inc.php";

        // For named paremeter
        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        // prepare the (PHP data object) and accept sql command as parameter
        $statement = $pdo->prepare($query);

        // this binds the search value to placeholder. It will replace the place holder by actual value
        $statement->bindParam(":usersearch", $userSearch);

        // executing of data object
        $statement->execute();
        
        // fetching the data as an array
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);


        // not require but good to do. Free the resources. Not submit anything
        $pdo = null;
        $statement = null;


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../searchForm.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../search/css/backend.css">
    <title>Document</title>
</head>

<body>
    <h3>Search Results:</h3>

    <?php
    if (empty($results)) {
        echo "<div>";
        echo "<p>There were no result!</p>";
        echo "<div>";
    } else {
    foreach ($results as $row) {
            echo "<div>";
            echo "<h4>" .htmlspecialchars($row["username"]) . "</h4>"; 
            echo "<h4>" . htmlspecialchars($row["commentText"]) . "</h4>";
            echo "</h4>". htmlspecialchars($row["created_at"]) . "</h4>";
            echo "<div>";
    }
}
    ?>
</body>

</html>