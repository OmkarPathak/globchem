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
                            <h2>Add Clients <small>add your clients here</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <form action="add_client.php"  method="post" enctype="multipart/form-data" class="form-label-left input_mask">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="clearfix" style="margin-left: 3%">
                                        <img class="img-fluid" src="http://via.placeholder.com/750x300" id="profile-img-tag"/>
                                        <input type="file" name="file" id="profile-img" style="margin-top: 3%">
                                        <input type="button" id="removeImage1" value="x" class="btn-rmv1 btn btn-danger" style="margin-top: 3%;margin-left: 5%"/>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                   <!--  <form class="form-label-left input_mask" method="POST"> -->

                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left"  name="client_name" placeholder="Client name...">
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12  offset-md-0">
                                                <button class="btn btn-danger" type="reset">Reset</button>
                                                <button type="submit" value="submit" class="btn btn-primary" name="btn_add_client">Submit</button>
                                            </div>
                                        </div>

                                <!-- </form> -->
                                </div>
                            </form>


                            <div class="clearfix"></div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM clients_logo";
                                                
                                                $result = mysqli_query($conn, $sql);
                                                
                                                if (!$result) 
                                                {
                                                    die ('SQL Error: ' . mysqli_error($conn));
                                                }
                                                
                                                while ($row = mysqli_fetch_array($result))
                                                { 
                                                   
                                                    echo '<tr>
                                                        <td>'.$row['client_name'].'</td>

                                                        <td><a href="edit_clients.php?id='.$row['client_id'].'"><button type="button" name="edit" class="btn btn-primary edit_data"><i class="fa fa-pencil"></i></button></a></td>
                                                        <td><a href="javascript:delete_id('.$row['client_id'].')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
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
    <!-- /page content -->




<script>
    function delete_id(id)
    {
        if(confirm('Sure To Remove This Record ?'))
        {
            window.location.href='delete.php?delete_client='+id;
        }
    }   
</script>

<?php
include('footer.php');
?>


<script type="text/javascript">
    function readURL(input) {
        // document.getElementById(removeImage1).style.display = 'block';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function(){
        readURL(this);
    });

    // document.getElementById(removeImage1).style.display = 'block';
    $("#removeImage1").click(function(e) {
        e.preventDefault();
        $("#profile-img").val("");
        $("#profile-img-tag").attr("src", "");
        // $('.preview1').removeClass('it');
        // $('.btn-rmv1').removeClass('rmv');
    });


</script>