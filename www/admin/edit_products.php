<?php

require 'config.php';
include('header.php');


if(isset($_GET['id']))
{
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM product_images WHERE product_id=".$product_id;

    $product_images = mysqli_query($conn,$sql);


    $sql_1 = "SELECT * FROM products WHERE product_id=".$product_id;

    $products = mysqli_query($conn,$sql_1);

    // print_r($products);
}

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
                            <h2>Edit Product <small>configure products</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <div class="container-fluid">
                                
                                <div class="row" style="margin-top: 1%;">
                                </div>
                                <!-- <form action="admin_product.php" method="POST" enctype="multipart/form-data"> -->
                                <form action="update_records.php"  method="post" enctype="multipart/form-data" class="form-label-left input_mask">

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div id="gallery" class="row">
                                                <?php 
                                                    while($row = mysqli_fetch_array($product_images)){ 
                                                        $filename = $row['product_image_link'];
                                                        echo "<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'>";
                                                        echo "<img id='image-gallery' name='image-gallery' class='img-fluid' src='uploads/products/".$filename."' data-image='uploads/products/".$filename."'>";
                                                        echo '<input type="hidden" name="image-gallery[]" value="'.$filename.'"/>';
                                                        echo "</div>";
                                                    }
                                                ?>
                                            </div>
                                            <input type="file" name= "files[]" id="profile-img" style="margin-top: 3%" multiple>

                                            <button class="btn btn-danger" type="reset">Reset</button>
                                            <button type="submit" value="submit" id="btn_edit_products" name="btn_edit_products" class="btn btn-primary" style="margin-top: 3%">Update</button>
                                                    
                                            <button type="button" value="button" onclick="goBack()" class="btn btn-danger" style="margin-top: 3%">Back</button>
                                        </div>
                                   
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            
                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Name:</b> -->
                                                <input type="text" class="form-control has-feedback-left" id="product_id2" name="product_id2"  readonly="true">
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                            </div>


                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <?php

                                                    while($row = mysqli_fetch_array($products)){
                                                        echo '<input type="text" class="form-control has-feedback-left" id="product_name2" name="product_name2" value="' . $row["product_name"] . '"  required>
                                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>';
                                                }
                                                ?>    
                                              
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Description:</b> -->
                                                <textarea class="form-control" id="product_desc2" name="product_desc2"></textarea>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Product Category:</b> -->
                                                <select class="browser-default custom-select" id="category_name2" name="category_name2">
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
                                                <?php
                                                    print_r($products);
                                                    while($row = mysqli_fetch_array($products)){
                                                        echo ($row1["product_usage"]); 
                                                        echo '<textarea class="form-control summernote_textarea" id="product_usage2" name="product_usage2" value="' . $row1["product_usage"] . '"></textarea>';
                                                    
                                                    }    
                                                ?>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <b class="clearfix">Product Features:</b>
                                                <textarea class="form-control summernote_textarea" id="product_features2" name="product_features2"></textarea>
                                            </div>  
                                            

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <!-- <b class="clearfix">Video Link:</b> -->
                                                <input type="text" class="form-control has-feedback-left" id="product_video_link2" name="product_video_link2" >
                                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <div class="input-group">
                                                    <input type="text" name="filename" class="form-control" placeholder="No file selected" readonly>
                                                    <span class="input-group-btn">
                                                        <div class="btn btn-success  custom-file-uploader">
                                                            <input type="file" name="file-browse" class="file-browse" onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                            Select a datasheet
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>

                                           <!--  <div class="form-group row">
                                                <div class="col-md-12 col-sm-12  offset-md-0">
                                                    <button class="btn btn-danger" type="reset">Reset</button>
                                                    <button type="submit" class="btn btn-primary" name="btn_add_product">Add Product</button>
                                                </div>
                                            </div> -->
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
        
        $("#pre-imgs").remove();
        $("#gallery img").remove();
        // $("#gallery-wrapper").prepend("<div id='gallery'></div>");

        // alert(total_file);
        for(var i = 0;i < total_file; i++)
        {
            $('#gallery').append("<div class='col-lg-5 col-md-5 col-sm-5 col-xs-5'><img src='"+URL.createObjectURL(event.target.files[i])+"' class='img-fluid'></div>");
        }
        // $("#gallery").unitegallery({
        //     gallery_width:1000,                          //gallery width     
        //     gallery_height:1364,
        // });
    }

    $("#profile-img").change(function(){
        // $("#gallery").remove();
        readURL(this);
    });
    
    $("#removeImage1").click(function(e) {
        e.preventDefault();
        $("#gallery img").remove();
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
<!-- <script>
$(document).ready(function(){

    var product_id = <?php echo $product_id; ?>;

    console.log(product_id)
    
    $.ajax({
            url:'fetch_records.php',
            method:'POST',
            data: {'product_id':product_id},
            dataType:"json",
            success: function(data){
                console.log(data);
                $('#product_id2').val(data.product_id);
                $('#product_name2').val(data.product_name);
                $('#product_desc2').val(data.product_desc);
                $('#category_name2').val(data.category_id);
                $('#product_usage2').val(data.product_usage);
                $('#product_features2').val(data.product_features);
                $('#product_video_link2').val(data.product_video_link);
          },

      });
});
</script> -->

<!-- <script>
$(function() {
    $("#gallery").sortable();
    $("#gallery").disableSelection();
});

$(function() {
    $("#pre-imgs").sortable();
    $("#pre-imgs").disableSelection();
});

$(document).ready(function(){
    $("img").each(function() {
        console.log($(this).attr("src"));
    });
});

</script>
 -->

<script>
function goBack() {
  window.history.back();
}
</script>


