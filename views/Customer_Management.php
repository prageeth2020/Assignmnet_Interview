<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b1c1380a86.js" crossorigin="anonymous"></script>
    <title>ERP System</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
	  <div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active text-white" aria-current="page" href="./Customer_Management.php">Customer Management</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="./Item_Management.php">Item Management</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="./Reports_Management.php">Reports Management</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="container">
		<div class="col text-end my-2"><button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">+ New Customer</button></div>
		<table class="table table-bordered">
		  <thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Title</th>
			  <th scope="col">First name</th>
			  <th scope="col">Last name</th>
			  <th scope="col">Contact number</th>
			  <th scope="col">District</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				require_once "../Database/Database.php";
				$db = new Database;
				$query = "select * from customer";
				$result = $db->query($query);
				
				if($result != null){
					//read data
					$count = 1;
					while($row = $result->fetch_assoc())
					{
						$title = $row["title"];
						$first_name = $row["first_name"];
						$last_name = $row["last_name"];
						$contact_no = $row["contact_no"];
						$district = $row["district"];
						echo "<tr>
							  <th scope=\"row\">$count</th>
							  <td>$title</td>
							  <td>$first_name</td>
							  <td>$last_name</td>
							  <td>$contact_no</td>
							  <td>$district</td>
							</tr>";
						$count++;
					}
				}
			
			?>
			
		  </tbody>
		</table>
	
	</div>
	
	
	
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form method="POST" action="../modules/addCustomer.php">
			  <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Title</label>
				<select name="title" id="selection" class="w-100">
					<option value="0">--Please choose an option--</option>
					<option value="Mr">Mr.</option>
					<option value="Mrs">Mrs.</option>
					<option value="Miss">Miss.</option>
					<option value="Dr">Dr.</option>
				</select>
			  </div>
			  <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">First Name</label>
				<input type="text" class="form-control" name="fname">
			  </div>
			  <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Middle Name</label>
				<input type="text" class="form-control" name="mname">
			  </div>
			  <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Last Name</label>
				<input type="text" class="form-control" name="lname">
			  </div>
			   <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Contact Number</label>
				<input type="number" class="form-control" name="contact">
			  </div>
			   <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">District</label>
				<input type="number" class="form-control" name="district">
			  </div>
			  <button type="submit" class="btn btn-info text-white">Submit</button>
			</form>
		  </div>
		</div>
	  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>