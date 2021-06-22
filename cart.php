<!-- INCLUDE HEADER -->
<?php
require('templates/header.php');
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: account_login.php");
  exit;
}
if(!isset($_SESSION['cart'])){

  echo "Add something to your cart ; )";
  exit;
}
?>

<!-- Cart item detail -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <div class="table-responsive mt-2">
        <table class="table text-center">
          <thead>
            <tr>
              <td colspan="6">
                <h4 class="text-center font-name font-size-20 m-0">My Cart</h4>
              </td>
            </tr>
            <tr>
              <th>Image</th>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // for ($i = 0; $i < count($_SESSION['cart']); $i++) :
            $counter = 0;
            foreach ($_SESSION['cart'] as $item) :

              // $item = $_SESSION['cart'][$i];
              foreach (getData() as $product) :
                //if ($product['productID'] == $item[1]) :
                if ($product['productID'] == $item[1]) :
            ?>
                  <tr>
                    <!-- PRODUCT IMAGE -->
                    <td><img src="./assets/products/<?php echo $product['productImage']; ?>" class="img-fluid"></td>

                    <!-- PRODUCT NAME -->
                    <td><?= $product['productName'] ?></td>

                    <!-- PRODUCT PRICE -->
                    <td>RM&nbsp;&nbsp;<?= number_format($product['productUnitPrice'], 2); ?></td>

                    <!-- PRODUCT  -->
                    <input type="hidden" id="price" value="<?= $product['productUnitPrice'] ?>">

                    <!-- PRODUCT QUANTITY -->
                    <td><?php echo $item[2] ?></td>

                    <!-- PRODUCT TOTAL-->
                    <td id="productPrice">RM&nbsp;&nbsp;<?= number_format($product['productUnitPrice'] * $item[2], 2); ?></td>

                    <!-- REMOVE PRODUCT FUNCTION -->
                    <td>
                      <form action="cart_remove.php" method="post">
                        <input type="hidden" name="product" value="<?php echo $counter ?>">
                        <button type="submit" class="btn btn-danger" name="remove" id="btnRemove">
                          <i class="fas fa-trash-alt"></i> Remove
                        </button>
                      </form>
                    </td>

                    <?php

                    ?>
                  </tr>
                  <?php
                  if (!isset($grand_total)) {
                    $grand_total = 0;
                  }
                  $grand_total += $product['productUnitPrice'] * $item[2];
                  $counter++;
                  ?>
            <?php
                endif;
              endforeach;
            endforeach;
            ?>
            <tr>
              <td colspan="2">
                <a href="index.php" class="btn btn-line-light font-function"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                  Shopping</a>
              </td>
              <td colspan="2"><b>Grand Total</b></td>
              <td><b>RM&nbsp;&nbsp;<?php
                                    if (!isset($grand_total)) {
                                      echo "0";
                                    } else {
                                      $_SESSION['grandTotal'] = $grand_total;
                                      echo number_format($grand_total, 2);
                                    } ?></b></td>
              <td>
                <a href="cart_checkout.php" class="btn btn-fill-black font-function <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require('templates/footer.php') ?>