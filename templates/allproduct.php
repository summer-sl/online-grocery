
<!-- show all products -->
<div id="productView" class="row main-section ">
	<?php
	foreach ($product_list as $product) {
	include('templates/product.php');
	}
	?>
</div>