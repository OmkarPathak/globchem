<?php
require 'config.php';

if(isset($_POST["btn_edit_category"]))
{
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id2']);
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name2']);
   
    $category_desc =  mysqli_real_escape_string($conn, $_POST['category_desc2']);
     
    // File upload configuration
    $targetDir = "uploads/category/";
    $allowTypes = array('jpg','png','jpeg','gif');
    // File upload path
    $file_name = basename($_FILES['file']['name']);
    

    $targetFilePath = $targetDir . $file_name;
    // Check whether file type is valid
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
    if($_FILES['file']['error'] != 4){
        if(in_array($fileType, $allowTypes)){
            if(is_dir($targetDir)==false){
                mkdir($targetDir, 0700);        // Create directory if it does not exist
            }
            
            if(!file_exists($targetFilePath)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    

                    $sql = "UPDATE category SET category_name = '$category_name',category_desc='$category_desc',category_icon='$file_name' WHERE category_id = '$category_id'";
                    $result = mysqli_query($conn,$sql);
                }
            }else{                                  //rename the file if another one exist
                $path_parts = pathinfo($file_name);
                $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
                $new_dir = $targetDir.$new_file_name;
                
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $new_dir)){

                    $sql = "UPDATE category SET category_name = '$category_name',category_desc='$category_desc',category_icon='$new_file_name' WHERE category_id = '$category_id'";
                    $result = mysqli_query($conn,$sql);
                }           
            }
        }
    }
    else{
        

        $sql = "UPDATE category SET category_name = '$category_name',category_desc='$category_desc' WHERE category_id = '$category_id'";
        $result = mysqli_query($conn,$sql);
    }
    
    echo "<script>window.history.go(-1);</script>";
    exit();
}




if(isset($_POST["btn_edit_products"]))
{
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id2']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name2']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc2']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_name2']);
    $product_usage =  mysqli_real_escape_string($conn, $_POST['product_usage2']);
    $product_features =  mysqli_real_escape_string($conn, $_POST['product_features2']);
    $product_video_link =  mysqli_real_escape_string($conn, $_POST['product_video_link2']);


    // print_r($quantity_list);
    $sql ="UPDATE products SET product_name = '$product_name', product_desc = '$product_desc', category_id='$category_id',product_usage = '$product_usage',product_features = '$product_features',product_video_link = '$product_video_link'  WHERE product_id = '$product_id'";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
   // echo $collection_name;
    
    // print_r($_FILES['files']);

    if($_FILES['files']['error'][0] != 4){
        $sql_5 ="DELETE FROM product_images WHERE product_id = '$product_id'";
        $result_5 = mysqli_query($conn,$sql_5);
        $targetDir = "uploads/products/";
        $allowTypes = array('jpg','png','jpeg','gif');
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
            // File upload path
            $file_name = basename($_FILES['files']['name'][$key]);
            
            $targetFilePath = $targetDir . $file_name;
            // Check whether file type is valid
            $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
            if(in_array($fileType, $allowTypes)){
                if(is_dir($targetDir)==false){
                    mkdir($targetDir, 0700);        // Create directory if it does not exist
                }
                
                if(!file_exists($targetFilePath)){
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                        $sql = "INSERT INTO product_images (product_id, product_image_link) VALUES ('$product_id', '$file_name')";
                        $result = mysqli_query($conn, $sql);
                    }
                }else{                                  //rename the file if another one exist
                    $path_parts = pathinfo($file_name);
                    $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
                    $new_dir = $targetDir.$new_file_name;
                    
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $new_dir)){
                        $sql = "INSERT INTO product_images (product_id, product_image_link) VALUES ('$product_id', '$new_file_name')";
                        $result = mysqli_query($conn, $sql);
                    }           
                }
            }
        }
    }else if($_POST['image-gallery']){
        $sql_5 ="DELETE FROM product_images WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql_5);
        foreach($_POST['image-gallery'] as $value){
            $sql = "INSERT INTO product_images (product_id, product_image_link) VALUES ('$product_id', '$value')";
            $result = mysqli_query($conn, $sql);
        }
    }
    // insert size array into product size mapping
   
    //header('Location: edit_product.php?id='.$product_id);
    echo "<script>window.history.go(-1);</script>";
    exit();
   
}



if(isset($_POST["btn_edit_client"]))
{
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id2']);
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name2']);

    // File upload configuration
    $targetDir = "uploads/clients/";
    $allowTypes = array('jpg','png','jpeg','gif');
    // File upload path
    $file_name = basename($_FILES['file']['name']);
    

    $targetFilePath = $targetDir . $file_name;
    // Check whether file type is valid
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
    if($_FILES['file']['error'] != 4){
        if(in_array($fileType, $allowTypes)){
            if(is_dir($targetDir)==false){
                mkdir($targetDir, 0700);        // Create directory if it does not exist
            }
            
            if(!file_exists($targetFilePath)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    

                    $sql = "UPDATE clients_logo SET client_name = '$client_name',logo='$file_name' WHERE client_id = '$client_id'";
                    $result = mysqli_query($conn,$sql);
                }
            }else{                                  //rename the file if another one exist
                $path_parts = pathinfo($file_name);
                $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
                $new_dir = $targetDir.$new_file_name;
                
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $new_dir)){

                    $sql = "UPDATE clients_logo SET client_name = '$client_name',logo='$new_file_name' WHERE client_id = '$client_id'";
                    $result = mysqli_query($conn,$sql);
                }           
            }
        }
    }
    else{
        

        $sql = "UPDATE clients_logo SET client_name = '$client_name' WHERE client_id = '$client_id'";
        $result = mysqli_query($conn,$sql);
    }
    
    echo "<script>window.history.go(-1);</script>";
    exit();
}




if(isset($_POST["btn_edit_count"]))
{
    $count_id = mysqli_real_escape_string($conn, $_POST['count_id2']);
    $count_name = mysqli_real_escape_string($conn, $_POST['count_name2']);
    $count = mysqli_real_escape_string($conn, $_POST['count2']);

    $sql = "UPDATE counts_config SET count_name = '$count_name',count = '$count'  WHERE count_id = '$count_id'";
    $result = mysqli_query($conn,$sql);

    echo "<script>window.history.go(-1);</script>";
    exit();
}


?>
