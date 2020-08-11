<?php
include('header.php');
require 'config.php'; 

?>
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
                                        <a class="nav-link active" href="show_products.php">Show Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="products.php">Add Product</a>
                                    </li>
                                </ul>
                                
                                <div class="clearfix"></div>
                                </br>
                                </br>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Desc</th>
                                                    <th>Video</th>
                                                    <th>Updated</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT products.* , category.category_name
                                                            FROM products
                                                            INNER JOIN category ON products.category_id = category.category_id";
                                                    
                                                    $result = mysqli_query($conn, $sql);
                                                    
                                                    if (!$result) 
                                                    {
                                                        die ('SQL Error: ' . mysqli_error($conn));
                                                    }
                                                    
                                                    while ($row = mysqli_fetch_array($result))
                                                    { 
                                                       
                                                        echo '<tr>
                                                            <td>'.$row['product_name'].'</td>
                                                            <td>'.$row['category_name'].'</td>
                                                            <td>'.$row['product_desc'].'</td>
                                                            <td>'.$row['product_video_link'].'</td>
                                                            <td>'.$row['updated_on'].'</td>

                                                            <td><a href="edit_products.php?id='.$row['product_id'].'"><button type="button" name="edit" class="btn btn-primary edit_data"><i class="fa fa-pencil"></i></button></a></td>
                                                            <td><a href="javascript:delete_id('.$row['product_id'].')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                                                        </tr>';
                                                     
                                                    }
                                                ?>    
                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<script>
    function delete_id(id)
    {
        if(confirm('Sure To Remove This Record ?'))
        {
            window.location.href='delete.php?delete_product='+id;
        }
    }   
</script>



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