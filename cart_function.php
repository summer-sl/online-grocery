<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user = $_SESSION['id'];
    $product = $_POST["productID"];
    $quantity = $_POST["quantity"];

    $cartArray = array($_SESSION['id'], $_POST["productID"], $_POST["quantity"]);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], $cartArray);
    } else {
        $flag = 0;
        for($i=0; $i<count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i][0]==$cartArray[0] && $_SESSION['cart'][$i][1]==$cartArray[1]){
                $_SESSION['cart'][$i][2] += $cartArray[2];
                $flag=1;
            }
        }
        if(!$flag){
            array_push($_SESSION['cart'], $cartArray);
        }  
    }
    header("location: index.php");
} else {
    header("location: account_login.php");
}
?>
