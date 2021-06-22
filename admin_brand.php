
<!-- Import Templates -->
<?php
    require('templates/header.php');
    require('templates/admin_header.php');
?>

<!-- Import Database Elements -->
<?php $product_list = getData('brand') ?>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Brand ID</th>
            <th scope="col">Brand Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="brand.php" class="form-inline" method="post">
                <!-- <td><textarea id="ID" name="ID" style="width: 75px;" class="form-control-sm-4 test"></textarea></td> -->
                <td><input name="ID" class="form-control form-inline" type="text"></input></td>
                <td><input name="name" class="form-control form-inline" type="text"></input></td>
                <td><input class="btn btn-primary" type="submit" name="add"></input></td>
        </tr>
        </form>
        </tr>
        <tr>
            <?php
            foreach ($product_list as $brand) { ?>
                <td>
                    <?php echo isset($brand['brandID']) ? $brand['brandID'] : "Unknowns"; ?>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($brand['brandName']) ? $brand['brandName'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <table>
                        <form action="brand.php" method="post">
                            <!-- <tr><td><input type="button" name="edit" value="Edit" class="btn btn-warning btn-block"></input></td></tr> -->
                            <tr>
                                <td><input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block"></input></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value="<?php echo $brand['brandID'] ?>"></input></td>
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
    $name = $_POST["name"];

    $sql = "INSERT INTO brand 
        VALUES ('$ID', '$name')
        ON DUPLICATE KEY UPDATE brandID = '$ID', brandName = '$name'";
} else if ($_POST['delete']) {
    $brand = $_POST["id"];
    $sql = "DELETE FROM brand WHERE brandID='$brand'";
} else {
    exit();
}
global $con;

if ($con->query($sql) === TRUE) {
    echo "Congratulations, product Record Updated : D";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
};
?>