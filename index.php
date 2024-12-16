<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <form action="includes/formhandler.php" method="post">
        <h2>Contact Form</h2>
        
        <!-- Name Input -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name">
        
        <!-- Email Input -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email">
        
        <!-- Subject Input -->
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Subject">
        
        <!-- Message Textarea -->
        <label for="favoriteCar">Favorite Car</label>
        <select id= "favoriteCar" name="favoriteCar">
            <option value="none">None</option>
            <option value="volvo">Volvo</option>
            <option value="honda">Honda</option>
            <option value="ferrari">Ferrari</option>
        </select>
        
        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</main>
</html>