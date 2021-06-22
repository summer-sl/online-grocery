<!-- Import Templates -->
<?php
require('templates/header.php');
require('templates/admin_header.php');
?>

<!-- Import Database Elements -->
<?php
$product_list = getData();
?>
<table class="table w-100 m-auto">
    <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Numeric Size</th>
            <th scope="col">Unit</th>
            <th scope="col">Image</th>
            <th scope="col">Ingredient</th>
            <th scope="col">Description</th>
            <th scope="col">Provider</th>
            <th scope="col">Stock</th>
            <th scope="col">Category</th>
            <th scope="col">Brand</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="admin_product.php" class="form-inline" method="post">
                <!-- <td><textarea id="ID" name="ID" style="width: 75px;" class="form-control-sm-4 test"></textarea></td> -->
                <td><textarea id="ID" name="ID" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="name" name="name" style="width: 100px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="unitPrice" name="unitPrice" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="numericSize" name="numericSize" style="width: 75px;" class="form-control-md form-inline" type="number"></textarea></td>
                <td><textarea id="unit" name="unit" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="image" name="image" style="width: 100px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="ingredient" name="ingredient" style="width: 100%;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="description" name="description" style="width: 100%;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="provider" name="provider" style="width: 100%;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="stock" name="stock" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="category" name="category" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><textarea id="brand" name="brand" style="width: 75px;" class="form-control-md form-inline"></textarea></td>
                <td><input class="btn btn-primary" type="submit" name="add"></input></td>
        </tr>
        </form>
        </tr>
        <tr>
            <?php
            foreach ($product_list as $product) { ?>
                <td>
                    <?php echo isset($product['productID']) ? $product['productID'] : "Unknowns"; ?>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productName']) ? $product['productName'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productUnitPrice']) ? $product['productUnitPrice'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productNumericSize']) ? $product['productNumericSize'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productUnit']) ? $product['productUnit'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <img class="img-fluid" src="./assets/products/<?php echo isset($product['productImage']) ? $product['productImage'] : "Unknowns"; ?>" alt="./assets/products/product1.jpg">
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productIngredient']) ? $product['productIngredient'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productDescription']) ? $product['productDescription'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productProvider']) ? $product['productProvider'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productStock']) ? $product['productStock'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productCategory']) ? $product['productCategory'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <div class="table-data-div">
                        <?php echo isset($product['productBrand']) ? $product['productBrand'] : "Unknowns"; ?>
                    </div>
                </td>
                <td>
                    <table>
                        <form action="admin_product.php" method="post">
                            <tr>
                                <td><input type="submit" name="delete" value="Delete" class="btn btn-danger btn-block"></input></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" value="<?php echo $product['productID'] ?>"></input></td>
                            </tr>
                        </form>
                    </table>
                    <script>
                        function editData(pid) {
                            document.cookie = "productID = pid";
                            document.getElementById('ID').innerHTML = product;
                            // document.getElementById('ID').innerHTML = "<?php echo $product['productID'] ?>";
                            document.getElementById("name").innerHTML = "<?php echo $product['productName'] ?>";
                            document.getElementById("unitPrice").innerHTML = "<?php echo $product['productUnitPrice'] ?>";
                            document.getElementById("numericSize").innerHTML = "<?php echo $product['productNumericSize'] ?>";
                            document.getElementById("unit").innerHTML = "<?php echo $product['productUnit'] ?>";
                            document.getElementById("image").innerHTML = "<?php echo $product['productImage'] ?>";
                            document.getElementById("ingredient").innerHTML = "<?php echo $product['productIngredient'] ?>";
                            document.getElementById("description").innerHTML = "<?php echo $product['productDescription'] ?>";
                            document.getElementById("provider").innerHTML = "<?php echo $product['productProvider'] ?>";
                            document.getElementById("stock").innerHTML = "<?php echo $product['productStock'] ?>";
                            document.getElementById("category").innerHTML = "<?php echo $product['productCategory'] ?>";
                            document.getElementById("brand").innerHTML = "<?php echo $product['productBrand'] ?>";

                        }
                    </script>
                </td>
        </tr>

    <?php } ?>
    </tbody>
</table>


<?php
if (isset($_POST['add']) || isset($_POST['delete'])) {
    if ($_POST['add']) {
        $ID = $_POST["ID"];
        $name = $_POST["name"];
        $unitPrice = $_POST["unitPrice"];
        $numericSize = $_POST["numericSize"];
        $unit = $_POST["unit"];
        $image = $_POST["image"];
        $ingredient = $_POST["ingredient"];
        $description = $_POST["description"];
        $provider = $_POST["provider"];
        $stock = $_POST["stock"];
        $category = $_POST["category"];
        $brand = $_POST["brand"];

        $sql = "INSERT INTO product 
            VALUES ('$ID', '$name', '$unitPrice', '$numericSize', '$unit', '$image', '$ingredient', '$description','$provider','$stock','$category','$brand')
            ON DUPLICATE KEY UPDATE productID = '$ID', productName = '$name', productUnitPrice = '$unitPrice', productNumericSize = '$numericSize', productUnit = '$unit', productImage = '$image', productIngredient = '$ingredient', productDescription = '$description', productProvider = '$provider', productStock = '$stock', productCategory = '$category', productBrand = '$brand' ";
    } else if ($_POST['delete']) {
        $product = $_POST["id"];
        $sql = "DELETE FROM product WHERE productID='$product'";
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
}

?>