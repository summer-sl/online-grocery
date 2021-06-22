<!-- Import Templates -->
<?php
require('templates/header.php');
require('templates/admin_header.php');
?>

<!-- Import Database Elements -->
<?php $product_list = getData('orders'); ?>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Order ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Order Total</th>
            <th scope="col">Status</th>
            <th scope="col">Date Time</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php
            foreach ($product_list as $order) { ?>
                <td>
                    <?php echo isset($order['orderID']) ? $order['orderID'] : "Unknowns"; ?>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($order['customerID']) ? $order['customerID'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($order['orderTotal']) ? $order['orderTotal'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($order['orderReceived']) ? $order['orderReceived'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($order['orderTime']) ? $order['orderTime'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <table>
                        <form action="order.php" method="post">
                            <!-- <tr><td><input type="button" name="edit" value="Edit" class="btn btn-warning btn-block"></input></td></tr> -->
                            <tr>
                                <td><input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block"></input></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value="<?php echo $order['orderID'] ?>"></input></td>
                            </tr>
                        </form>
                    </table>
                </td>
        </tr>

    <?php } ?>
    </tbody>
</table>

<?php
if (!isset($_POST['add']) || !isset($_POST['delete'])) {
    exit();
} else {
    if ($_POST['add']) {
        $ID = $_POST["ID"];
        $payment = $_POST["payment"];
        $customer = $_POST["customer"];
        $delivery = $_POST["delivery"];
        $status = $_POST["status"];
        $dateTime = $_POST["dateTime"];

        $sql = "INSERT INTO order 
            VALUES ('$ID', '$payment', '$customer', '$delivery', '$status', '$dateTime')
            ON DUPLICATE KEY UPDATE orderID = '$ID', orderPayment = '$payment', customerID = '$customer', orderDelivery = '$delivery', orderReceived = '$status', ordersDateTime = '$dateTime'";
    } else if ($_POST['delete']) {
        $order = $_POST["id"];
        $sql = "DELETE FROM product WHERE productID='$order'";
    } else {
        exit();
    }
}
global $con;

if ($con->query($sql) === TRUE) {
    echo "Congratulations, product Record Updated : D";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
};
?>