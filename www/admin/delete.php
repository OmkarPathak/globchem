<?php

require 'config.php';
if(isset($_GET['delete_category']))
{

	$sql = "DELETE FROM category WHERE category_id =" .$_GET['delete_category'];
	$result = mysqli_query($conn,$sql);

	header('Location:category.php');
	exit();
}


if(isset($_GET['delete_product']))
{

	$sql = "DELETE FROM products WHERE product_id =" .$_GET['delete_product'];
	$result = mysqli_query($conn,$sql);

	header('Location:show_products.php');
	exit();
}


if(isset($_GET['delete_client']))
{

	$sql = "DELETE FROM clients_logo WHERE client_id =" .$_GET['delete_client'];
	$result = mysqli_query($conn,$sql);

	header('Location:clients.php');
	exit();
}




if(isset($_GET['delete_count']))
{

	$sql = "DELETE FROM counts_config WHERE count_id =" .$_GET['delete_count'];
	$result = mysqli_query($conn,$sql);

	header('Location:count_config.php');
	exit();
}

?>