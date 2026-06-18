<?php
    session_start();

    if(!isset($_SESSION['counts'])){
        $_SESSION['counts'] = [
            'JSP' => 0,
            'PHP' => 0,
            'JavaScript' => 0,
            'Python' => 0
        ];
    }

    $lang = $_SESSION['lang'];
    $_SESSION['counts'][$lang]++;

    $total = array_sum($_SESSION['counts']);
    $percentage = round(($_SESSION['counts'][$lang] / $total) * 100);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>RESULT</title>
    </head>
    <body>
        <h2>Thank you, <?php echo htmlspecialchars($_POST['name']); ?>!</h2>
        <p>You are part of the <?php echo $percentage; ?>% of people who chose <?php echo htmlspecialchars($lang); ?>.</p>
    </body>
</html>