<?php
require 'config.php';
function add_products()
{    
    require 'config.php';

    if(isset($_POST["product_name"])){
        $product_name = $_POST["product_name"];
    }
    else{
        $product_name = "NA";
    }
    if(isset($_POST["product_desc"])){
        $product_desc = mysqli_real_escape_string($conn, $_POST["product_desc"]);   
    }
    else{
        $product_desc = "NA";
    }
    if(isset($_POST["category_name"])){
        $category_id = $_POST["category_name"];
    }
    else{
        $category_id = 1;
    }
    if(isset($_POST["product_usage"])){
        $product_usage = $_POST["product_usage"];
    }
    else{
        $product_usage = "";
    }
    
    if(isset($_POST["product_features"])){
        $product_features = $_POST["product_features"];
    }
    else{
        $product_features = "";
    }
    
    if(isset($_POST["product_dataset"])){
        $product_dataset = $_POST["product_dataset"];
    }
    else{
        $product_dataset = "NA";
    }

    if(isset($_POST["product_video_link"])){
        $product_video_link = $_POST["product_video_link"];
    }
    else{
        $product_video_link = "";
    }
    

    // insert images into tbl_pictures
    // File upload configuration
    $targetDir = "uploads/datasheets/";
    $allowTypes = array('pdf');

    // File upload path
    $file_name = basename($_FILES['file-browse']['name']);
       
    $targetFilePath = $targetDir . $file_name;
    // Check whether file type is valid
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    if(in_array($fileType, $allowTypes))
    {
        if(is_dir($targetDir)==false)
        {
            mkdir($targetDir, 0700);        // Create directory if it does not exist
        }
        
        if(!file_exists($targetFilePath))
        {
            if(move_uploaded_file($_FILES["file-browse"]["tmp_name"], $targetFilePath))
            {
               
                // insert records in product table
                $sql ="INSERT INTO products (product_name,category_id,product_desc,product_features,product_usage,product_dataset,product_video_link) VALUES ('$product_name','$category_id','$product_desc','$product_features','$product_usage','$file_name','$product_video_link')";
                    
                // echo $sql;
                $result = mysqli_query($conn,$sql);
            }
        }
        else
        {   //rename the file if another one exist
            $path_parts = pathinfo($file_name);
            $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
            $new_dir = $targetDir.$new_file_name;
            
            if(move_uploaded_file($_FILES["file-browse"]["tmp_name"], $new_dir))
            {
               
                // insert records in product table
                $sql ="INSERT INTO products (product_name,category_id,product_desc,product_features,product_usage,product_dataset,product_video_link) VALUES ('$product_name','$category_id','$product_desc','$product_features','$product_usage','$new_file_name','$product_video_link')";
                    
                // echo $sql;
                $result = mysqli_query($conn,$sql);
            }           
        }

        // selecting the product id that recently added in the table
        $sql = "SELECT MAX(product_id) as product_id FROM products";
                                
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $product_id = $row['product_id'];


        print_r($_FILES['files']);

        // insert images into tbl_pictures
        // File upload configuration
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
                        $sql = "INSERT INTO product_images (product_id,product_image_link) VALUES ('$product_id', '$file_name')";
                        $result = mysqli_query($conn, $sql);
                    }
                }else{                                  //rename the file if another one exist
                    $path_parts = pathinfo($file_name);
                    $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
                    $new_dir = $targetDir.$new_file_name;
                    
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $new_dir)){
                        $sql = "INSERT INTO product_images (product_id,product_image_link) VALUES ('$product_id', '$new_file_name')";
                        $result = mysqli_query($conn, $sql);
                    }           
                }
            }
        }

    }
    
   
}
add_products();
header("Location: products.php");
?>