<?php 
	// include connect script
	include("connect.php");
	// declare variable and initialize to empty string
	$status = true;
	$title = $author = $isbn = "";

	// check if values are set
	if(isset($_POST['submit'])) {
		if(isset($_POST['title'])) {
			$title = $_POST['title'];
		}

		if(isset($_POST['author'])) {
			$author = $_POST['author'];
		}

		if(isset($_POST['isbn'])) {
			$isbn = $_POST['isbn'];
		}

		$query = "INSERT INTO book(title, author, isbn, status) VALUES ('$title', '$author', '$isbn' , '$status')";

		$result = mysqli_query($conn, $query);

		if(!$result) {
			die("Failed to add record " . mysqli_error($conn));
		} else {
			echo "record added successfully";
			header("Location: index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>LIBSYS | Add Book</title>
</head>
<body>
	<div class="container">
		<div class="row h-75 justify-content-center align-items-center mt-5">
			<h2 class="text-center">Library Management System</h2>
			<hr class="w-100">
			
			<form class="clearfix" method="post" action="<?php $PHP_SELF; ?>">
				<h3 class="text-center">Add new book</h3>
				<hr>
			  	<div class="form-group">
			    	<label for="title">Title</label>
			    	<input type="text" class="form-control" name="title" placeholder="Enter Book Title">
			  	</div>

			  	<div class="form-group">
				    <label for="author">Author</label>
				    <input type="text" class="form-control" name="author" placeholder="Enter Book Author">
			  	</div>

			  	<div class="form-group">
			  		<label for="isbn">ISBN</label>
			    	<input type="text" class="form-control" name="isbn" placeholder="978-1-888983-30-2">			    
			  	</div>
			  	<button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>