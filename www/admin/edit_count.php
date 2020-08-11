<?php
include('header.php');
require 'config.php'; 

if(isset($_GET['id']))
{
    $count_id = $_GET['id'];  
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
                            <h2>Edit Counts <small>Edit counts here</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <form action="update_records.php"  method="post"  class="form-label-left input_mask">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-8">
                                   <!--  <form class="form-label-left input_mask" method="POST"> -->

                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="count_id2"  name="count_id2"  readonly="true">
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="count_name2"  name="count_name2" >
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="number" class="form-control has-feedback-left" id="count2"  name="count2" >
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12  offset-md-0">
                                                <button class="btn btn-danger" type="reset">Reset</button>
                                                <button type="submit" value="submit" class="btn btn-primary" name="btn_edit_count">Update</button>
                                                <button type="button" value="button" onclick="goBack()" class="btn btn-danger" style="margin-top: 0%">Back</button>
                                            </div>
                                        </div>

                                <!-- </form> -->
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">  
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

     var count_id = '<?php echo $count_id; ?>';

     $.ajax({
            url:'fetch_records.php',
            method:'POST',
            data: {'count_id':count_id},
            dataType:"json",
            success: function(data){
                console.log(data)
                $('#count_id2').val(data.count_id);
                $('#count_name2').val(data.count_name);
                $('#count2').val(data.count);
               
          },

      });

  });

</script>


<script>
function goBack() {
  window.history.back();
}
</script>