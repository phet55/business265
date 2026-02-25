<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phet</title>
</head>

<body>


    <?php
    $serverName = 'localhost';
    $userName = 'Phet';
    $userPassword = ''; //Lab room 408 or 409 - 12345678
    $dbname = 'business';


    try {
        $conn = new PDO(
            "___________:host=Phet;dbname= business ;charset=UTF8",
            ____________,
            ____________
        );


        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'You are now connecting to database!';
    } catch (PDOException $e) {
        echo 'Sorry! You cannot connect to database: ' . $e->getMessage();
    }
    ?>

</body>

</html>