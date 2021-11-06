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
			  <a class="nav-link " aria-current="page" href="./Customer_Management.php">Customer Management</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active text-white" href="./Item_Management.php">Item Management</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="./Reports_Management.php">Reports Management</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="container">
		<div class="col text-end my-2"><button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">+ New Item</button></div>
		<table class="table table-bordered">
		  <thead>
			<tr>
			  <th scope="col">Item code</th>
			  <th scope="col">Item name</th>
			  <th scope="col">Item category</th>
			  <th scope="col">Item sub category</th>
			  <th scope="col">Quantity</th>
			  <th scope="col">Unit price</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				require_once "../Database/Database.php";
				$db = new Database;
				$query = "select * from item";
				$result = $db->query($query);
				
				if($result != null){
					//read data
					$count = 1;
					while($row = $result->fetch_assoc())
					{
						$item_code = $row["item_code"];
						$item_name = $row["item_name"];
						$item_category = $row["item_category"];
						$item_subcategory = $row["item_subcategory"];
						$quantity = $row["quantity"];
						$unit_price = $row["unit_price"];
						echo "<tr>
							  <th scope=\"row\">$item_code</th>
							  <td>$item_name</td>
							  <td>$item_category</td>
							  <td>$item_subcategory</td>
							  <td>$quantity</td>
							  <td>$unit_price</td>
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
			<h5 class="modal-title" id="exampleModalLabel">Create New Item</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form method="POST" action="../modules/addItem.php">
			  <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Item Code</label>
				<input type="text" class="form-control" name="code">
			  </div>
			   <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Item Name</label>
				<input type="text" class="form-control" name="name">
			  </div>
			  
			  <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Item Category</label>
				<select name="Category" id="selection" class="w-100">
					<option value="0">--Please choose an option--</option>
					<?php
						$query = "select * from item_category";
						$result = $db->query($query);
						
						if($result != null){
							while($row = $result->fetch_assoc())
							{
								$category = $row["category"];
								$id = $row["id"];
							
								echo "<option value=\"$id\">$category</option>";
							}
						}
					
					?>
				</select>
			  </div>
			  
			  <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Item Sub Category</label>
				<select name="subCategory" id="selection" class="w-100">
					<option value="0">--Please choose an option--</option>
					<?php
						$query = "select * from item_subcategory";
						$result = $db->query($query);
						
						if($result != null){
							while($row = $result->fetch_assoc())
							{
								$sub_category = $row["sub_category"];
								$id = $row["id"];
							
								echo "<option value=\"$id\">$sub_category</option>";
							}
						}
					
					?>
				</select>
			  </div>
			  
			  
			   <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Quantity</label>
				<input type="number" class="form-control" name="qty">
			  </div>
			   <div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Unit Price</label>
				<input type="text" class="form-control" name="unitPrice">
			  </div>
			  
			  <button type="submit" class="btn btn-success text-white">Add Item</button>
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