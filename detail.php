<html>

<head>
    <title>Display Student Detail</title>
</head>

<body>

    <?php
    require "connect.php";

    if (isset($_GET["Student_ID"])) {
        $Student_ID = $_GET["Student_ID"];
    } else {
        die("ไม่พบรหัสนักเรียน");
    }

    $sql = "SELECT *
        FROM register_detail
        INNER JOIN register 
            ON register_detail.Regis_ID = register.Register_ID
        INNER JOIN student 
            ON register.Student_ID = student.Student_ID
        INNER JOIN course 
            ON register_detail.Course_ID = course.Course_ID
        WHERE student.Student_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$Student_ID]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        die("ไม่พบข้อมูล");
    }
    ?>

    <h2>รายละเอียดนักเรียน</h2>

    <table width="500" border="1">

        <tr>
            <th>รหัสนักเรียน</th>
            <td><?php echo $result["Student_ID"]; ?></td>
        </tr>

        <tr>
            <th>ชื่อ</th>
            <td><?php echo $result["Student_Fname"]; ?></td>
        </tr>

        <tr>
            <th>รายวิชา</th>
            <td><?php echo $result["Course_name"]; ?></td>
        </tr>

        <tr>
            <th>เทอม</th>
            <td><?php echo $result["Term"]; ?></td>
        </tr>

        <tr>
            <th>วันที่ลงทะเบียน</th>
            <td><?php echo $result["Register_dateTIme"]; ?></td>
        </tr>

        <tr>
            <th>เกรด</th>
            <td><?php echo $result["Grade"]; ?></td>
        </tr>

    </table>

    <br>
    <a href="selec1.php">← กลับหน้าหลัก</a>

    <?php
    $conn = null;
    ?>

</body>

</html>