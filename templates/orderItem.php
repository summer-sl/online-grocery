<!-- the template for each product card -->
<div class="col-xs-2 col-sm-4 col-lg-3 mt-2 py-2">

    <div class="card-deck h-100">

        <div class="card " style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title font-name font-size-20">#<?php echo $order['orderID']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Created at <?php echo $order['orderTime']; ?></h6>


                <!-- CUSTOME NAME -->
                <p class="card-text">
                    <b>Name: </b>
                    <?php
                    $customerID =  $order['customerID'];
                    $name = filterData("SELECT * FROM users WHERE id='$customerID'");

                    foreach ($name as $item) {
                        echo $item['username'];
                    }
                    ?>
                </p>


                <!-- TOTAL -->
                <p class="card-text">
                    <b>Grand Total:</b>
                    RM <?php echo $order['orderTotal']; ?>
                </p>


                <!-- STATUS -->
                <p class="card-text">
                    <b>Status:</b>
                    <?php
                    $status = $order['orderReceived'];
                    if (!$status) {
                        echo "Not Received";
                    } else if ($status) {
                        echo "Received";
                    } else {
                        echo "Unknown Status :-(";
                    }
                    ?>
                </p>

                <?php
                $status = $order['orderReceived'];
                if (!$status) { ?>
                    <!-- Button add to cart, value manual enter, default set as 1 -->
                    <form action="order_received.php" method="POST" class="form-inline my-2 my-lg-2">
                        <input class="form-control mr-sm-2 col-2" type="hidden" name="orderID" value="<?php echo $order['orderID'] ?>">
                        <button class="btn btn-fill-black my-2 my-sm-0" type="submit">Received</button>
                    </form>
                <?php } ?>

            </div>
        </div>


    </div>

</div>