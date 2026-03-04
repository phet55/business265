<?php
require "connect.php";
if (isset($_POST['CustomerID'])) {


    $CustomerID = $_POST['CustomerID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Birthdate = $_POST['Birthdate'];
    $OutstandingDebt = $_POST['OutstandingDebt'];


    $sql = "update Customer set Name =:Name,Email=:Email,Birthdate=:Birthdate,OutstandingDebt=:OutstandingDebt Where CustomerID=:CustomerID ";
    $stmt = $conn->prepare($sql);


    $stmt->bindparam(':Name', $Name);
    $stmt->bindparam(':Email', $Email);
    $stmt->bindparam(':CustomerID', $CustomerID);
    $stmt->bindparam(':Birthdate', $Brirthdate);
    $stmt->bindparam(':OutstandingDebt', $OutstandingDebt);
    $stmt->execute();
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
