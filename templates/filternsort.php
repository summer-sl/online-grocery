<!-- for filter and sorting function, the dropdown buttons -->
<?php
$category_list = getData('category');
$brand_list = getData('brand');
?>
<header>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<a href=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

			<!-- CATEGORY DROPDOWN -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
					Category
				</a>
				<div class="dropdown-menu">
					<?php
					foreach ($category_list as $category) { ?>
						<a class="dropdown-item small" href="<?php printf('%s?categoryID=%s', 'product_category.php',  $category['categoryID']);
																printf('&categoryName=%s', $category['categoryName']); ?>">
							<?php echo isset($category['categoryName']) ? $category['categoryName'] : "Unknowns"; ?>
						</a>
					<?php } ?>
				</div>
			</li>

			<!-- BRAND DROPDOWN -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
					Brand
				</a>
				<div class="dropdown-menu">
					<?php
					foreach ($brand_list as $brand) { ?>
						<a class="dropdown-item small" href="<?php printf('%s?brandID=%s', 'product_brand.php',  $brand['brandID']);
																printf('&brandName=%s', $brand['brandName']); ?>">
							<?php echo isset($brand['brandName']) ? $brand['brandName'] : "Unknowns"; ?>
						</a>
					<?php } ?>
				</div>
			</li>

			<!-- SORT DROPDOWN -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
					Sort By
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item small" href="<?php printf('%s?order=%s', 'product_sort.php', 'Price Low to High'); ?>">Price: Low to High</a>
					<a class="dropdown-item small" href="<?php printf('%s?order=%s', 'product_sort.php', 'Price High to Low'); ?>">Price: High to Low</a>
					<a class="dropdown-item small" href="<?php printf('%s?order=%s', 'product_sort.php', 'A to Z'); ?>">Name: A to Z</a>
					<a class="dropdown-item small" href="<?php printf('%s?order=%s', 'product_sort.php', 'Z to A'); ?>">Name: Z to A</a>
				</div>
			</li>
		</ul>

		<!-- SEARCH PRODUCT -->
		<form action="product_search.php" method="POST" class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
			<button class="btn btn-line-light my-2 my-sm-0 mr-4" type="submit" name="submit">Search</button>
		</form>
	</div>
</nav>
</header>