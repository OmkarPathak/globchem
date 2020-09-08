<?php 
$page = 'products';
include('header.php');
require 'admin/config.php';

if(isset($_GET['id']))
{
    $product_id = $_GET['id'];
}

// echo $product_id;

// Get the product category information

$sql = "SELECT products.*
        FROM products 
        WHERE product_id  = ".$product_id."";

$product = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($product))
{
    $product_name = $row['product_name'];
    $product_usage = $row['product_usage'];
    $product_dataset = $row['product_dataset'];
    $product_features = $row['product_features'];
    $product_video_link = $row['product_video_link'];
    $product_desc = $row['product_desc'];

}



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
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Category</h2>
                    <h3>Select a product <span>Category</span></h3>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-5 col-md-5 icon-box" data-aos="fade-up" style="margin-bottom:20px;">
                        <div class="product_thumbnail_slides owl-carousel owl-theme">
                            <?php
                                $sql = "SELECT product_image_link FROM product_images WHERE product_id=".$product_id."";      
                                $images = mysqli_query($conn, $sql);
                                while($row_image = mysqli_fetch_array($images))
                                {
                                    echo '<img class="img-fluid zoom_01" src="admin/uploads/products/'.$row_image['product_image_link'].'" data-zoom-image= "admin/uploads/products/'.$row_image['product_image_link'].'" alt="">';
                                }
                            ?>
                        </div>

                        <div class="col-lg-12 video-box">
                            <?php
                                // while($row = mysqli_fetch_array($product))
                                // {
                                    echo'    
                                    <iframe id="video" src="'.$product_video_link.'" wmode="transparent" type="application/x-shockwave-flash" width="420" height="315" allowfullscreen="true" title="Adobe Flash Player"></iframe>';

                                    // echo ' <div class="col-lg-6 video-box">
                                    //             <img src="assets/img/about.jpg" class="img-fluid" alt="">
                                    //             <a href="'.$product_video_link.'" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                                    //         </div>';
                                // }    
                            ?>
                            
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-7 col-md-7 icon-box" data-aos="fade-up" data-aos-delay="100" style="margin-bottom:20px;">
                        <?php
                            // while($row = mysqli_fetch_array($product))
                            // {
                                echo    '<h2>'.$product_name.'</h2>    
                                        <p class="description">'.$product_desc.'</p>
                                        <h4 class="product_features">'.$product_features.'</h4>
                                        <h5 class="product_usage">'.$product_usage.'</h5> 
                                        <a href="admin/uploads/datasheets/'.$product_dataset.'" download="'.$product_dataset.'"><button class="btn"><i class="fa fa-download"></i>Download Datasheet</button></a>'; 
                            // }
                        
                        ?>
                    </div>
                   
                </div>
                    
            </div>
        </section><!-- End Team Section -->


    </main><!-- End #main -->

<?php
    include('footer.php');
?>


<script type="text/javascript">
    $(document).ready(function() {
 
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,

            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:1,
                    nav:false
                },
                1000:{
                    items:1,
                    nav:true,
                    loop:true
                }
            }
        });
     
    });
</script>
<script>
    $('.zoom_01').ezPlus();
</script>