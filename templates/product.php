<!-- Import Database Elements -->
<?php
$product_list = getData();
?>

<!-- the template for each product card -->
<div class="col-md-4 col-sm-6 col-xs-12 col-lg-3 mb-4">
	<div class="card product-card card mt-3 h-100 rounded">
		<!-- display product image, url to enable user to be redirect to the corresponding product -->

		<a class="p-3" href="<?php printf('%s?productID=%s', 'product_info.php',  $product['productID']);
					printf('&productCategory=%s', $product['productCategory']); ?>"><img class="card-img-top rounded card-img img-responsive" src="./assets/products/<?php echo $product['productImage'] ?>"></a>

		<div class="card-body mb-4">

			<!-- display product name, url to enable user to be redirect to the corresponding product -->
			<a href="<?php printf('%s?productID=%s', 'product_info.php',  $product['productID']);
						printf('&productCategory=%s', $product['productCategory']); ?>">
				<h4 class="card-title h-50 font-name font-size-20"><?php echo $product['productName']; ?></h4>
			</a>
			<h5 class="card-text">&nbsp;</h5>

			<!-- display price of the product -->
			<h4 class="card-text font-name"><b>RM <?php echo $product['productUnitPrice']; ?></b></h4>

			<!-- Button add to cart, value manual enter, default set as 1 -->
			<form action="cart_function.php" method="POST" class="form-inline my-2 my-lg-2">
				<input class="form-control mr-sm-2 col-4" type="number" name="quantity" value="1">
				<input class="form-control mr-sm-2 col-2" type="hidden" name="productID" value="<?php echo $product['productID'] ?>">
				<button class="btn btn-fill-black font-function my-2 my-sm-0" type="submit" id="btnCart">Add to cart</button>
			</form>
		</div>
	</div>
</div>