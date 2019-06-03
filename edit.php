<?php 
	// include connection script
	include("connect.php");

	if(isset($_POST['update'])) {
		$id = $_POST['id'];

		if(isset($_POST['title'])) {
			$title = $_POST['title'];
		}

		if(isset($_POST['author'])) {
			$author = $_POST['author'];
		}

		if(isset($_POST['isbn'])) {
			$isbn = $_POST['isbn'];
		}

		$query = "UPDATE book SET title='$title', author='$author', isbn='$isbn' WHERE id='$id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if($result) {
			header("Location: index.php");
		}
	}
?>

<?php 
	// get id from the url
	$i = $_GET['id'];
	// retrive data from database
	$bkTitle = $bkAuthor = $bkIsbn = "";
	$result = mysqli_query($conn, "SELECT title, author, isbn FROM book WHERE id='$i'") or die(mysqli_error($conn));
	if($result) {
		$row = mysqli_fetch_assoc($result);

		$bkTitle = $row['title'];
		$bkAuthor = $row['author'];
		$bkIsbn = $row['isbn'];
	}
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Edit Form</title>
</head>
<body>
	<div class="container">
		<div class="row h-75 justify-content-center align-items-center mt-5">
			<h2 class="text-center">Library Management System</h2>
			<hr class="w-100">
			
			<form class="w-100" method="post" action="<?php $PHP_SELF; ?>">
				<!-- <a href="index.php" class="btn btn-sm btn-primary">&larr;Go Back</a> -->
				<h3 class="text-center">update form</h3>
				<hr>
			  	<div class="form-group">
			    	<label for="title">Title</label>
			    	<input type="text" class="form-control" name="title" value="<?php echo $bkTitle; ?>">
			  	</div>

			  	<div class="form-group">
				    <label for="author">Author</label>
				    <input type="text" class="form-control" name="author" value="<?php echo $bkAuthor; ?>">
			  	</div>

			  	<div class="form-group">
			  		<label for="isbn">ISBN</label>
			    	<input type="text" class="form-control" name="isbn" value="<?php echo $bkIsbn; ?>">			    
			  	</div>
			  	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			  	<button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
			</form>
		</div>
	</div>
</body>
</html>