<?php   
	$title = $_POST['title'];
	$first_name = $_POST['fname'];
	$middle_name =  $_POST['mname'];
	$last_name =  $_POST['lname'];
	$contact_no = $_POST['contact'];
	$district =  $_POST['district'] ;

	require_once "../Database/Database.php";
	
	$db = new Database;
	
	$query = "INSERT into customer (ID , title , first_name , middle_name , last_name , contact_no , district) 
	value(NULL , '$title' , '$first_name' ,  '$middle_name' , '$last_name'  , '$contact_no' , '$district') ";
	if($db->query($query)) {
		 echo '<script>window.location.href = "../views/Customer_Management.php";</script>';				
	}
	else {
		die(trigger_error(mysqli_error($con)));
	}			

	
?>