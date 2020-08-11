<?php
include('header.php');
require 'config.php'; 

if(isset($_GET['id']))
{
    $category_id = $_GET['id'];  
}


?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit product Categories <small>Edit product categories</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <form action="update_records.php"  method="post" enctype="multipart/form-data" class="form-label-left input_mask">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="clearfix" style="margin-left: 3%">
                                        <img class="img-fluid" src="http://via.placeholder.com/750x300" id="category_img"/>
                                        <input type="file" name="file" id="profile-img" style="margin-top: 3%">
                                        <input type="button" id="removeImage1" value="x" class="btn-rmv1 btn btn-danger" style="margin-top: 3%;margin-left: 5%"/>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                   <!--  <form class="form-label-left input_mask" method="POST"> -->

                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="category_id2"  name="category_id2"  readonly="true">
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="category_name2"  name="category_name2" >
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-lg-12  form-group has-feedback">
                                            <textarea class="form-control"  id="category_desc2" name="category_desc2" ></textarea>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12  offset-md-0">
                                                <button class="btn btn-danger" type="reset">Reset</button>
                                                <button type="submit" value="submit" class="btn btn-primary" name="btn_edit_category">Update</button>
                                                <button type="button" value="button" onclick="goBack()" class="btn btn-danger" style="margin-top: 0%">Back</button>
                                            </div>
                                        </div>

                                <!-- </form> -->
                                </div>
                            </form>

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
$(document).ready(function(){

     var category_id = '<?php echo $category_id; ?>';

     $.ajax({
            url:'fetch_records.php',
            method:'POST',
            data: {'category_id':category_id},
            dataType:"json",
            success: function(data){
                console.log(data)
                $('#category_id2').val(data.category_id);
                $('#category_name2').val(data.category_name);
                $('#category_desc2').val(data.category_desc);
              
                $('#category_img').attr('src', 'uploads/category/' + data.category_icon);
               

               
          },

      });

  });

</script>

<script>
function readURL(input) {
    // document.getElementById(removeImage1).style.display = 'block';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#category_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile-img").change(function(){
    readURL(this);
});

$("#removeImage1").click(function(e) {
    e.preventDefault();
    $("#profile-img").val("");
    $("#category_img").attr("src", "");
});
</script>

<script>
function goBack() {
  window.history.back();
}
</script>