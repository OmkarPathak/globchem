<?php 
$page = 'products';
include('header.php');
require 'admin/config.php';

$category_id = $_GET['id'];

// Get the product category information
$sql = "SELECT products.*,product_images.product_image_link
		FROM products 
		INNER JOIN product_images ON products.product_id = product_images.product_id
		WHERE products.category_id = ".$category_id." GROUP BY products.product_name";

$products = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.btn {
	  background-color: DodgerBlue;
	  border: none;
	  color: white;
	  padding: 7px 30px;
	  cursor: pointer;
	  font-size: 20px;
	}

	/* Darker background on mouse-over */
	.btn:hover {
	  background-color: RoyalBlue;
	}
</style>

    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Products</h2>
                    <ol>
                        <li><a href="products.php">Products</a></li>
                        <li>Categories</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->

        
        <!-- ======= Team Section ======= -->
        <section id="team" class="">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Products</h2>
                    <h3>Check all  <span>Products</span></h3>
                    <p></p>
                </div>

                <div class="row">
                	<?php
                     	while ($row = mysqli_fetch_array($products))
                        {
                        	
                        	echo 	'<div class="col-sm-12 col-lg-5 col-md-5 icon-box" data-aos="fade-up" style="margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-10 col-lg-10">    
                                				<a href="show_product.php?id='.$row['product_id'].'">  
                                					<img src="admin/uploads/products/'.$row['product_image_link'].'" class="img-fluid zoom_01" alt=""> 
                                				</a>
                                            </div>    
                                        </div>    
                    				</div>
		                    		<div class="col-sm-12 col-lg-7 col-md-7 icon-box" data-aos="fade-up" data-aos-delay="100" style="margin-bottom:20px;">
                                        <center>
    		                    			<a href="show_product.php?id='.$row['product_id'].'">  
    		                    				<h2>'.$row['product_name'].'</h2>
    		                    			</a>	
    				                        <div class="description">'.$row['product_desc'].'</div>
    				                        
    				                        <a href="admin/uploads/datasheets/'.$row['product_dataset'].'" download="'.$row['product_dataset'].'"><button class="btn"><i class="fa fa-download"></i>Download Datasheet</button></a> 
                                        </center>    
				                    </div>';
                        }

                    ?>
                   
                </div>
                    
            </div>
        </section><!-- End Team Section -->


    </main><!-- End #main -->

<?php
    include('footer.php');
?>
<script>
    $('.zoom_01').ezPlus();
</script>