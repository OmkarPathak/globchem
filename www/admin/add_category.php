<?php
require 'config.php';

function add_category()
{

    require 'config.php';

    if(isset($_POST["category_name"])){
        $category_name = mysqli_real_escape_string($conn, $_POST["category_name"]);
    }
    else{
        $category_name = "NA";
    }


    if(isset($_POST["category_desc"])){
        $category_desc = mysqli_real_escape_string($conn, $_POST["category_desc"]);
    }
    else{
        $category_desc = "NA";
    }


   
    // insert images into tbl_pictures
    // File upload configuration
    $targetDir = "uploads/category/";
    $allowTypes = array('jpg','png','jpeg','gif');

    // File upload path
    $file_name = basename($_FILES['file']['name']);
        // echo($category_desc);
        // echo($category_name);
        // print_r($_FILES['file']);

    // exit();
   
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
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
               
                $sql =  "INSERT INTO category(category_name,category_desc,category_icon) 
                        VALUES ('$category_name','$category_desc','$file_name')";
                
                $result = mysqli_query($conn,$sql);
            }
        }
        else
        {   //rename the file if another one exist
            $path_parts = pathinfo($file_name);
            $new_file_name = $path_parts["filename"].time().".".$path_parts["extension"];
            $new_dir = $targetDir.$new_file_name;
            
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $new_dir))
            {
               
                $sql =  "INSERT INTO category(category_name,category_desc,category_icon) 
                        VALUES ('$category_name','$category_desc','$new_file_name')";
                $result = mysqli_query($conn,$sql);
            }           
        }
    }

}
add_category();
header("Location: category.php");

?>