<?php
include('header.php');
require 'config.php'; 

$sql = "SELECT count(user_id) FROM user_credentials";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total_users = $row[0];


$sql = "SELECT count(category_id) FROM category";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$categories = $row[0];


$sql = "SELECT count(product_id) FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$products = $row[0];


?>
   <!-- page content -->
    <div class="right_col" role="main">

        <div class="row" style="display: inline-block; width:100%;" >
            <div class="tile_count">
                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                    <div class="count"><?php echo $total_users; ?></div>
                    <span class="count_bottom"><i class="green"></i> All Available Users</span>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Categories</span>
                    <div class="count red"><?php echo $categories; ?></div>
                    <span class="count_bottom"><i class="green"></i> All Available Categories</span>
                </div>


                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Placeholder 3</span>
                    <div class="count">102</div>
                    <span class="count_bottom"><i class="red"><i class="green"></i></i>Need Somrthing Here!!</span>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
                    <div class="count"><?php echo $products; ?></div>
                    <span class="count_bottom"><i class="red"><i class="green"></i></i>All Available Products</span>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Placeholder 2</span>
                    <div class="count">101</div>
                    <span class="count_bottom"><i class="red"><i class="green"></i></i>Need Somrthing Here!!</span>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Placeholder 3</span>
                    <div class="count">102</div>
                    <span class="count_bottom"><i class="red"><i class="green"></i></i>Need Somrthing Here!!</span>
                </div>

            </div>
        </div>
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Statistics/Reports Will Go Here !!!</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


<?php
include('footer.php');
?>
