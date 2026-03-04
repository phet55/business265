<?php
require 'connect.php';

if (isset($_GET['CustomerID'])) {
    $id = $_GET['CustomerID'];

    $sql = "DELETE FROM customer WHERE CustomerID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header("Location: index.php"); // กลับไปหน้าแสดงข้อมูล
exit();
