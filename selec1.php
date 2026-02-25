<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>

<body>

    <?php
    require "connect.php";

    $sql = "SELECT 
            student.Student_ID,
            student.Student_Fname,
            register.Term,
            register.Register_DateTime,
            register_detail.Grade
        FROM register_detail
        INNER JOIN register 
            ON register_detail.Regis_ID = register.Register_ID
        INNER JOIN student 
            ON register.Student_ID = student.Student_ID
        INNER JOIN course 
            ON register_detail.Course_ID = course.Course_ID";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1">
        <tr>
            <th>รหัสนักเรียน</th>
            <th>ชื่อ</th>
            <th>เทอม</th>
            <th>วันที่ลงคะแนน</th>
            <th>เกรด</th>
        </tr>

        <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

            <tr>
                <td>
                    <a href="detail.php?Student_ID=<?php echo $result['Student_ID']; ?>">
                        <?php echo $result['Student_ID']; ?>
                    </a>
                </td>

                <td><?php echo $result['Student_Fname']; ?></td>
                <td><?php echo $result['Term']; ?></td>
                <td><?php echo $result['Register_DateTime']; ?></td>
                <td><?php echo $result['Grade']; ?></td>
            </tr>

        <?php } ?>

    </table>

</body>

</html>