<?php

include('config.php');

if(isset($_POST["category_id"]))
{
	$sql ="SELECT * FROM category WHERE category_id = '".$_POST["category_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}


if(isset($_POST["product_id"]))
{
	$sql ="SELECT * FROM products WHERE product_id = '".$_POST["product_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}



if(isset($_POST["client_id"]))
{
	$sql ="SELECT * FROM clients_logo WHERE client_id = '".$_POST["client_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}

if(isset($_POST["count_id"]))
{
	$sql ="SELECT * FROM counts_config WHERE count_id = '".$_POST["count_id"]."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}



?>