<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Country</h1>
    <form action="addcountry.php" method="POST">
        <input type="text" placeholder="Entry Country code" name="CountryCode">
        <br><br>
        <input type="text" placeholder="Enter Country code" name="CountryName">
        <br><br>
        <input type="submit">
    </form>
    <?php

    if (!empty($_POST['CountryCode']) && !empty($_POST['CountryName'])):

        require 'connect.php';

        $sql_insert = "insert into country
               values(:CountryCode, :CountryName)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
        $stmt->bindParam(':CountryName', $_POST['CountryName']);

        if ($stmt->execute()):
            $message = 'Suscessfully add new country';
        else:
            $message = 'Fail to add new country';
        endif;
        echo $message;
        $conn = null;
    endif;
    ?>

</body>

</html>