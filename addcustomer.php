<?php
require 'connect.php';

$message = '';

$sql_select_country = "SELECT CountryCode, CountryName FROM country";
$stmt_s = $conn->prepare($sql_select_country);
$stmt_s->execute();

if (!empty($_POST['customerID']) && !empty($_POST['Name'])):
    try {
        $sql_insert = "INSERT INTO customer (CustomerID, Name, Birthdate, Email, CountryCode, OutstandingDebt) 
                       VALUES (:customerID, :Name, :birthdate, :email, :countryCode, :outstandingDebt)";

        $stmt = $conn->prepare($sql_insert);
        $stmt->bindParam(':customerID', $_POST['customerID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':birthdate', $_POST['birthdate']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':countryCode', $_POST['countryCode']);
        $stmt->bindParam(':outstandingDebt', $_POST['outstandingDebt']);

        if ($stmt->execute()):
            $message = '<p style="color:green;">Successfully added new customer!</p>';
        else:
            $message = '<p style="color:red;">Fail to add new customer.</p>';
        endif;
    } catch (PDOException $e) {
        $message = '<p style="color:red;">Error: ' . $e->getMessage() . '</p>';
    }
endif;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
</head>

<body>
    <h1>Add Customer</h1>

    <?php echo $message; ?>

    <form action="" method="POST">
        <input type="text" placeholder="Enter Customer ID" name="customerID" required> <br><br>
        <input type="text" placeholder="Name" name="Name" required> <br><br>
        <input type="date" name="birthdate"> <br><br>
        <input type="email" placeholder="Email" name="email"> <br><br>

        <label>Select Country Code</label>
        <select name="countryCode">
            <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>

        <input type="number" placeholder="Outstanding debt" name="outstandingDebt">
        <input type="submit" value="Add Customer">
    </form>
</body>

</html>