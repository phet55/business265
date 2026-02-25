<html>

<head>
    <title>Show Customer Information</title>
</head>

<body>
    <?php
    try {
        require 'connect.php';
        $sql = "select * from customer";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // แบบที่ 2 (FETCH_NUM)
        while ($result = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<br>' .
                'รหัสลูกค้าของฉัน : ' .
                $result[0] .      // CustomerID
                ' วันเกิด : ' .
                $result[2] .      // Birthdate
                ' ยอดหนี้ : ' .
                $result[5];       // OutstandingDebt
        }
    } catch (PDOException $e) {
        echo 'ไม่สามารถประมวลผลข้อมูลได้ : ' . $e->getMessage();
    }

    $conn = null;
    ?>
</body>

</html>