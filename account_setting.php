<?php
require('templates/header.php');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: account_login.php");
    exit;
}
?>

<!-- Import Database Elements -->
<?php $user_list = getData('users');
foreach ($user_list as $user) :
    if ($user['id'] == $_SESSION['id']) :
?>

        <div class="m-auto w-50 text-center">


            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Address</h5>

                    <p class="card-text"><?php echo isset($user['address']) ? $user['address'] : "Unknowns"; ?></p>
            <?php
        endif;
    endforeach; ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="nav-link btn btn-line-light" data-toggle="modal" data-target="#myModal"><span><i class="fa fa-address-book text-white"></i></span> Change Address</a></li>
                    <li class="list-group-item"><a class="nav-link btn btn-fill-black " href="account_reset.php"><span><i class="fa fa-key text-white"></i></span> Reset Password</a></li>
                </ul>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <form action="account_updateAddress.php" method="post">
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                                <div class="form-group">
                                    <label for="addressField">Fill in Your Address</label>
                                    <textarea class="form-control" name="address" id="addressField" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-fill-black">Save changes</button>
                                <button type="button" class="btn btn-line-light" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php require('templates/footer.php') ?>