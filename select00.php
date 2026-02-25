<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM customer ,country  WHERE country.CountryCode = customer.CountryCode;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?><table width="800" border="1">
        <tr>
            <th width="90">
                <div align="center">รหัสผู้ใช้ </div>
            </th>
            <!-- <th width="140">
                <div align="center">ชื่อ </div>
            </th> -->
            <th width="120">
                <div align="center">วันเกิด </div>
            </th>
            <th width="50">
                <div align="center">ประเทศ </div>
            </th>
            <th width="100">
                <div align="center">อีเมล์ </div>
            </th>
            <!-- <th width="70">
                <div align="center">ยอดหนี้</div>
            </th> -->
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>

                <td>
                    <a href="detail.php?CustomerID=<?php echo $result['CustomerID']; ?>">
                        <?php echo $result["CustomerID"]; ?>

                </td>

                <!-- <td>
                <?php echo $result['Name'] ?>
            </td> -->

                <td><?php echo  $result['Birthdate'] ?></div>
                </td>

                <!-- <td><?php echo $result["OutstandingDebt"]; ?></td> -->

                <td><?php echo  $result['CountryName'] ?></td>
                <td><?php echo  $result['Email'] ?></div>
                </td>

            </tr>

        <?php
        }
        ?>

    </table>

</body>

</html>