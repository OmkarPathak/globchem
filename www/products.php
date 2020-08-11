<?php
$page = 'products';
include('header.php');

require 'admin/config.php';
// Get the product category information

$sql = "SELECT * FROM category";
$category = mysqli_query($conn, $sql);

?>

<style type="text/css">
    .content {
      position: relative;
      width: 100%;
      max-width: 400px;
      margin: auto;
      overflow: hidden;
    }

    .content .content-overlay {
      background: rgba(0,0,0,0.7);
      position: absolute;
      height: 100%;
      width: 100%;
      left: 0;
      top: 0;
      bottom: 0;
      right: 0;
      opacity: 0;
      -webkit-transition: all 0.4s ease-in-out 0s;
      -moz-transition: all 0.4s ease-in-out 0s;
      transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay{
      opacity: 1;
    }

    .content-image{
      width: 100%;
    }

    .content-details {
      position: absolute;
      text-align: center;
      padding-left: 1em;
      padding-right: 1em;
      width: 100%;
      top: 50%;
      left: 50%;
      opacity: 0;
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      -webkit-transition: all 0.3s ease-in-out 0s;
      -moz-transition: all 0.3s ease-in-out 0s;
      transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details{
      top: 50%;
      left: 50%;
      opacity: 1;
    }

    .content-details h3{
      color: #fff;
      font-weight: 500;
      letter-spacing: 0.15em;
      margin-bottom: 0.5em;
      text-transform: uppercase;
    }

    .content-details p{
      color: #fff;
      font-size: 0.9em;
      font-weight: 600;
    }

    .fadeIn-bottom{
      top: 80%;
    }

    .fadeIn-top{
      top: 20%;
    }

    .fadeIn-left{
      left: 20%;
    }

    .fadeIn-right{
      left: 80%;
    }



    .member-info{
        text-transform: uppercase;
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
                    <?php
                        while ($row = mysqli_fetch_array($category))
                        {
                            echo ' <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                        <div class="member">
                                            <div class="member-img content">
                                                <a href="product_details.php?'.$row['category_id'].'">   
                                                    <div class="content-overlay"></div>
                                                    <img src="admin/uploads/category/'.$row['category_icon'].'" class="img-fluid content-image" alt="">
                                                    <div class="content-details fadeIn-top">
                                                        <p>'.$row['category_desc'].'</p>
                                                    </div>
                                                </a>    
                                            </div>
                                            <div class="member-info">
                                                <h4>'. $row['category_name'].'</h4>
                                            </div>
                                        </div>
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


<!-- This is an example for a reference if need to changes further  Do not delete this -->
<!-- 
<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
    <div class="member">
        <div class="member-img content">
            <a href="#" target="_blank">   
                <div class="content-overlay"></div>
                <img src="assets/img/category/wall.png" class="img-fluid content-image" alt="">
                <div class="content-details fadeIn-top">
                    <h3>This is a title</h3>
                    <p>This is a short description</p>
                </div>
            </a>    
        </div>
        <div class="member-info">
            <h4>MASONRY MORTARS</h4>
            <span>Construction</span>
        </div>
    </div>
</div> -->