<?php   
	$code = $_POST['code'];
	$name = $_POST['name'];
	$Category =  $_POST['Category'];
	$subCategory =  $_POST['subCategory'];
	$qty = $_POST['qty'];
	$unitPrice =  $_POST['unitPrice'] ;

	require_once "../Database/Database.php";
	
	$db = new Database;
	
	$query = "INSERT into item (ID , item_code , item_name , item_category , item_subcategory , quantity , unit_price) 
	value(NULL , '$code' , '$name' ,  '$Category' , '$subCategory'  , '$qty' , '$unitPrice') ";
	if($db->query($query)) {
		 echo '<script>window.location.href = "../views/Item_Management.php";</script>';				
	}
	else {
		die(trigger_error(mysqli_error($con)));
	}			

	
?>