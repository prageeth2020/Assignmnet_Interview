<?php
	
	require_once "Database.php";
	session_start();
	

	function login($Username , $Password) {
		$con = getConnection();
		$sql = "SELECT * from users WHERE email = '$Username' AND password = '$Password'";
		$result = $con->query($sql);
		
		if($result->num_rows > 0){
			 echo '<script>window.location.href = "../index.php";</script>';
		}
		else {
			echo '<script>alert("invaild username or password");</script>';
			 echo '<script>window.location.href = "../login.html";</script>';
		}
				
	}
	
	function getOneUser($email) {
		$con = getConnection();
		$sql = "SELECT * from users WHERE email = '$email' ";
		$result = $con->query($sql);
		
		if($result->num_rows > 0){
			$data = array(9); 
			while($row = $result->fetch_assoc())
			{ 
				$data[0] = $row["id"];
				$data[1] = $row["firstname"];
				$data[2] = $row["lastname"];
				$data[3] = $row["company"];
				$data[4] = $row["email"];
				$data[5] = $row["password"];
				$data[6] = $row["mobilenu"];
				$data[7] = $row["laguage"];
				$data[8] = $row["status"];
			}
			return $data;
		}
	
				
	}
	
	function deleteUser($ID) {
		$con = getConnection();
		$sql = "DELETE  from users WHERE id = '$ID' ";
		$result = $con->query($sql);
		
		if($result == "TRUE"){
			echo '<script>window.location.href = "../login.html";</script>';
			unset($_SESSION['email']);
		}
	
				
	}
	
	function noOfAccounts() {
		$con = getConnection();
		$sql = "SELECT COUNT(id) AS count from users ";
		$result = $con->query($sql);
		$count = 0;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc())
			{
				$count = $row["count"];;
			}
			
			echo "<h3 style=\"text-align : center;\"><i class=\"fas fa-user\" style=\"padding : 10px;\"></i>$count</h3>";
		}
		
				
	}
	
	
	
	function signUp($firstname  , $lastname , $company, $email, $password, $mobilenu, $language, $status  ) {
		$con = getConnection();
		$sql2 = "INSERT into users (ID , firstname , lastname , company , email , password , mobilenu , laguage , status) 
		value(NULL , '$firstname' , '$lastname' ,  '$company' , '$email'  , '$password' , '$mobilenu' ,  '$language' , '$status') ";
		if($con->query($sql2)) {
			 echo '<script>window.location.href = "../index.php";</script>';				
		}
		else {
			die(trigger_error(mysqli_error($con)));
		}
	}
	
	function updateUser($ID , $firstname  , $lastname , $company, $email, $password, $mobilenu  ) {
		$con = getConnection();
		$sql2 = "UPDATE  users SET firstname = '$firstname' , lastname = '$lastname' , company = '$company' , email = '$email' , password  = '$password', mobilenu = '$mobilenu'  WHERE id = '$ID'";
		if($con->query($sql2)) {
			 echo '<script>window.location.href = "../profile.php";</script>';				
		}
		else {
			die(trigger_error(mysqli_error($con)));
		}
	}
?>