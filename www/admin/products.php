<?php
include('header.php');
require 'config.php'; 

?>

<style type="text/css">
    .custom-file-uploader {
        position: relative;
    }
    .file-browse{
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 5;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: default;
    }

</style>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
           <!--  <div class="page-title">
                <div class="title_left">
                    <h3>Index Page</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Products <small>add and configure products</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <div class="container-fluid">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link" href="show_products.php">Show Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="products.php">Add Product</a>
                                    </li>
                                </ul>
                                <div class="row" style="margin-top: 4%;">
                                </div>
                                <!-- <form action="admin_product.php" method="POST" enctype="multipart/form-data"> -->
                                <form action="add_products.php"  method="post" enctype="multipart/form-data" class="form-label-left input_mask">

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div id="gallery" class="row">
                                                <!-- <img id="default" src="http://www.stleos.uq.edu.au/wp-content/uploads/2016/08/image-placeholder-350x350.png" data-image="http://www.stleos.uq.edu.au/wp-content/uploads/2016/08/image-placeholder-350x350.png"> -->
                                            </div>
                                            <div class="row clearfix" id="default-img" style="margin-left: 3%;margin-right: 1%;">
                                                <img class="img-fluid" id="default" src="http://via.placeholder.com/400x400">
                                                <input type="file" name= "files[]" id="profile-img" style="margin-top: 3%" multiple>
                                                <input type="button" id="removeImage1" value="x" class="btn-rmv1 btn btn-danger" style="margin-top: 3%;margin-left:5%"/>
                                                <!-- <img src="" id="profile-img-tag" width="350px" height="350px" /> -->
                                            </div>
                                               
                                        </div>
                                   
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                        <!-- <form action="admin_product.php" method="POST"> -->
                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Name:</b> -->
                                                <input type="text" class="form-control has-feedback-left" name="product_name" placeholder="Product name..." required>
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Description:</b> -->
                                                
                                                <textarea class="form-control" id="product_desc" name="product_desc" placeholder="Product Description..."></textarea>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Category:</b> -->
                                                <select class="browser-default custom-select" id="category_name" name="category_name">
                                                    <option  selected="true" disabled="disabled">Select Category</option>
                                                    <?php
                                                         $sql = "SELECT DISTINCT(category_name),category_id FROM category";
                                                      
                                                          $result = mysqli_query($conn, $sql);
                                                          while($row = mysqli_fetch_array($result))
                                                         {
                                                          echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>'; 
                                                         }
                                                          if (!$result)
                                                           {
                                                              die ('SQL Error: ' . mysqli_error($conn));
                                                           }
                                                    ?>
                                                </select>
                                            </div>

                                            

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Usage:</b> -->
                                                <textarea class="form-control summernote_textarea" id="product_usage" name="product_usage" placeholder="Product Usage..."></textarea>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Features:</b> -->
                                                <textarea class="form-control summernote_textarea" id="product_features" name="product_features" placeholder="Product Features..."></textarea>
                                            </div>  
                                            

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Video Link:</b> -->
                                                <input type="text" class="form-control has-feedback-left" name="product_video_link" placeholder="Product video link...">
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <div class="input-group">
                                                    <input type="text" name="filename" class="form-control" placeholder="No file selected" readonly>
                                                    <span class="input-group-btn">
                                                        <div class="btn btn-success  custom-file-uploader">
                                                            <input type="file" name="file-browse" class="file-browse"  onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                            Select a datasheet
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12  offset-md-0">
                                                    <button class="btn btn-danger" type="reset">Reset</button>
                                                    <button type="submit" class="btn btn-primary" name="btn_add_product">Add Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>     
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


<?php
include('footer.php');
?>


<script type="text/javascript">
    function readURL(input) {
        var total_file = document.getElementById("profile-img").files.length;
        // alert(total_file);
        for(var i = 0;i < total_file; i++)
        {
            $('#gallery').append("<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><img src='"+URL.createObjectURL(event.target.files[i])+"' class='img-fluid'></div>");
        }
        $('#default').remove();
        // $("#gallery").unitegallery({
        //     gallery_width:1000,                          //gallery width     
        //     gallery_height:1364,
        // });
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    // document.getElementById(removeImage1).style.display = 'block';
    $("#removeImage1").click(function(e) {
        e.preventDefault();
        $("#profile-img").val("");
        $("#profile-img-tag").attr("src", "");
        $("#gallery img").remove();
        $("#default-img").prepend('<img class="img-fluid" id="default" src="http://via.placeholder.com/400x550">');
    });

    $(function() {
        $("#gallery").sortable();
        $("#gallery").disableSelection();
    });
</script>



<!-- <script type="text/javascript">
   

    $(document).ready(function() {
        $('.summernote_textarea').summernote({
            toolbar: [
              ['style', ['style']],
               ['font', ['bold', 'underline', 'clear']],
              ['para', ['ul', 'ol', 'paragraph']]
              
            ]
        });
    });
</script> -->