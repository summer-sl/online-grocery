<!-- INCLUDE HEADER -->
<?php
require('templates/header.php');
?>

<body>
	<div class="m-auto w-50 text-center">
		<div class="row justify-content-center">
			<div class="col-lg-6 px-4 pb-4" id="order">
				<h4 class="text-center text-name p-2">Thank You!</h4>

				<div class="jumbotron p-3 mb-2 text-center">
					<!-- PRODUCT TOTAL -->
					<p class="text-paragraph"><b>Sub Total : </b><?= $_SESSION['grandTotal']; ?></p>

					<!--  SHIPPING FEE -->
					<p class="text-paragraph"><b>Shipment : </b>RM 5.00 </p>

					<!-- GRAND TOTAL -->
					<p class="text-paragraph"><b>Grand Total : </b>RM<?= $_SESSION['grandTotal'] + 5 ?></p>

					<!-- ADRRESS -->
					<p class="text-paragraph"><b>Address : </b>

						<?php $user_list = getData('users');
						foreach ($user_list as $user) {
							if ($user['id'] == $_SESSION['id']) {
								echo $user['address'];
							}
						}
						?>
					</p>
				</div>
				<!-- Back Button -->
				<div class="container-fluid padding my-2">
					<a href="index.php" class="btn btn-fill-black font-function">Back</a>
					<a href="order.php" class="btn btn-fill-black font-function">View Orders</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
<?php

// INSERT ORDER DETAILS

$ID = $_SESSION['id'];
$total = $_SESSION['grandTotal'];

$sql = "INSERT INTO orders VALUES (NULL, '$ID','$total','0' ,CURRENT_TIMESTAMP)";

global $con;

if ($con->query($sql) === TRUE) {
	// echo "Congratulations, product Record Updated : D";
} else {
	echo "Error: " . $sql . "<br>" . $con->error;
};
?>