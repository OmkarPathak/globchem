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
                            <h2>Add Counts <small>add your counts here</small></h2>
                           <!--  <button type="button" class="btn btn-primary" style="float: right;" onclick="location.href='user_demo_mapping.php';">User Demo Mapping</button> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <!-- <form action="add_count.php"  method="post"  class="form-label-left input_mask">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                </div>

                                <div class="col-sm-12 col-md-8 col-lg-8">
                            
                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left"  name="count_name" placeholder="Count For...">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-left"  name="count" placeholder="Count">
                                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12  offset-md-0">
                                            <button class="btn btn-danger" type="reset">Reset</button>
                                            <button type="submit" value="submit" class="btn btn-primary" name="btn_add_count">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-2 col-lg-2">
                                </div>
                            </form>
 -->

                            <div class="clearfix"></div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Count For</th>
                                                <th>Count</th>
                                                <th></th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM counts_config";
                                                
                                                $result = mysqli_query($conn, $sql);
                                                
                                                if (!$result) 
                                                {
                                                    die ('SQL Error: ' . mysqli_error($conn));
                                                }
                                                
                                                while ($row = mysqli_fetch_array($result))
                                                { 
                                                   
                                                    echo '<tr>
                                                        <td>'.$row['count_name'].'</td>
                                                        <td>'.$row['count'].'</td>
                                                        <td><a href="edit_count.php?id='.$row['count_id'].'"><button type="button" name="edit" class="btn btn-primary edit_data"><i class="fa fa-pencil"></i></button></a></td>
                                                       <!-- <td><a href="javascript:delete_id('.$row['count_id'].')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td> -->
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
            window.location.href='delete.php?delete_count='+id;
        }
    }   
</script>

<?php
include('footer.php');
?>
