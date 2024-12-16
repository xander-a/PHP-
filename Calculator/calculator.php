<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/calculator.css">
    <title>Document</title>
</head>

<body>
    <form class="container calculator" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="num1">Input Integer 1:</label>
        <input type="text" id="num1" name="num1"><br><br>

        <label for="num2">Input Integer 2:</label>
        <input type="text" id="num2" name="num2"><br><br>

        <label for="operator">Operator:</label>
        <select id="operator" name="operator" required>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select><br><br>
        <input type="submit" name="submit">
    </form>
    <?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Always sanitize data
        // Do not trust the user inputs
        $num1 = filter_input(INPUT_POST,"num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST,"num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);
        $error = false;
        $value = 0;
        

        // Error handling
        if (empty($num1) || empty($num2)) {
            $error = true;
            echo "You need to input a number";
        }

        if(!is_numeric($num1) || !is_numeric($num2)) {
            $error = true;
            echo "Only numbers are allowed";
        }


        if(!$error) {
        switch($operator){
            case "add":
                $value = $num1 + $num2;
                break;
            case "subtract":
                $value = $num1 - $num2;
                break;
            case "multiply":
                $value = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0){
                    $error = true;
                }else{
                    $value = $num1 / $num2;
                }
                break;
            default:
                echo "Only write Numbers";
        }   
        echo "<p class='calc-result'> Result = " . $value . "</p>";

    }

        
        
    }
    ?> 
</body>

</html>