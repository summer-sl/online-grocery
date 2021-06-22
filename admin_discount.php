<!-- Import Templates -->
<?php
require('templates/header.php');
require('templates/admin_header.php');
?>

<!-- Import Database Elements -->
<?php $product_list = getData('discount'); ?>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Product ID</th>
            <th scope="col">Discount Due</th>
            <th scope="col">Discount Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="discount.php" class="form-inline" method="post">
                <td><input id="ID" name="ID" class="form-control form-inline" type="text"></input></td>
                <td><input id="date" name="date" class="form-control" type="date" value="2021-08-19"></input></td>
                <td><input id="discountPrice" name="discountPrice" class="form-control" type="text"></input></td>
                <td><input class="btn btn-primary" type="submit" name="add"></input></td>
        </tr>
        </form>
        </tr>
        <tr>
            <?php
            foreach ($product_list as $product) { ?>
                <td>
                    <?php echo isset($product['discountProductID']) ? $product['discountProductID'] : "Unknowns"; ?>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['discountDueDate']) ? $product['discountDueDate'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['discountPrice']) ? $product['discountPrice'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <table>
                        <form action="discount.php" method="post">
                            <tr>
                                <td><input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block"></input></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value="<?php echo $product['discountProductID'] ?>"></input></td>
                            </tr>
                        </form>
                    </table>
                </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
if ($_POST['add']) {
    $ID = $_POST["ID"];
    $date = $_POST["date"];
    $discountPrice = $_POST["discountPrice"];

    $sql = "INSERT INTO discount 
        VALUES ('$ID', '$date', '$discountPrice')
        ON DUPLICATE KEY UPDATE discountProductID = '$ID', discountDueDate = '$date', discountPrice = '$discountPrice'";
} else if ($_POST['delete']) {
    $product = $_POST["id"];
    $sql = "DELETE FROM discount WHERE productID='$product'";
} else {
    exit();
}
global $con;

if ($con->query($sql) === TRUE) {
    echo "Congratulations, product Record Updated : D";
    echo "<meta http-equiv='refresh' content='0'>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
};
?>