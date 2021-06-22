<?php
    session_start();
    require("connection.php");

    $address = $_POST["address"];
    $userID = $_SESSION['id'];

    $sql = "UPDATE users SET address = '$address' WHERE id = '$userID'";
    global $con;

    if ($con->query($sql) === TRUE) {
        echo "Congratulations, product Record Updated : D";
        header("location: account_setting.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    };
?>