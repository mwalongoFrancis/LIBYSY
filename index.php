<?php 
	// include connect script
	include("connect.php");

	// query the database
	$query = "SELECT * FROM book ORDER BY id";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Homepage</title>
</head>
<body>
	<div class="container">

		<div class="container">
			<table class="table table-hover mt-3">
				<thead>
					<tr class="bg-secondary text-light">
						<th>Title</th>
						<th>author</th>
						<th>ISBN</th>
						<th>status</th>
						<th>update</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						
						while($res = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>".$res['title']."</td>";
							echo "<td>".$res['author']."</td>";
							echo "<td>".$res['isbn']."</td>";
							echo "<td>".$res['status']."</td>";
							echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-sm btn-primary\">Edit</a> | <a href=\"delete_record.php?id=$res[id]\" class=\"btn btn-sm btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
						}
					?>
				</tbody>
			</table>
			<a href="addBook.php" class="btn btn-primary">Add Book</a>
		</div>
	</div>
</body>
</html>