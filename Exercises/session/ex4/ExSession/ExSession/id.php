<?php

    session_start();
    if(isset($_POST['lang'])){
        $_SESSION['lang'] = $_POST['lang'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>IDENTIFICATION</title>
    </head>
    <body>
        <form method="post" action="result.php">
            <label>Name:</label><input type="text" placeholder="Your Name" name="name" required>
            <button type="submit">Send</button>
        </form>
    </body>
</html>