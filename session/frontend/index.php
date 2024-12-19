<?php
// Starting a session. Sessions remember information of the user in every page of website
session_start();

// assigning a data to a session variable
// We can also see this in other page that session started
$_SESSION["username"] = "Xander";


// Unset session data
unset($_SESSION["username"]);

// Unset all of data
session_unset();

// Unset the session ID on the server
session_destroy();

// To completely destroy and unset everything
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $_SESSION["username"];
    ?>
</body>
</html>