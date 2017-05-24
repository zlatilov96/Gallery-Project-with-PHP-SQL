<?php

	// Check if the user who tries to access is logged in with his ADMIN email.
	// If not, redirect to index.php because he should have access to enter this page.
	if(!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!' , '_self')</script>";
	}
	
	// Else show the page. Closing bracket for else statement is at the very bottom of the page.
	else {
		
?>

<!DOCTYPE>
<html>
<head>
	<title>PhotoGallery View Photos</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
	
<body>
	<table id="view_photos">
		<tr align="center">
			<td colspan="6"><h2>View Photos</h2></td>
		</tr>
		<tr align="center">
			<th>Id</th>
			<th>Title</th>
			<th>Photo</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		
			<?php 
				
				// Getting all the data from the "gallery" table in the DB
				// and displaying all the photos into a table
				// + adding buttons to Edit / Delete a photo.
			
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				
				$get_pro = "SELECT * FROM gallery";
				$run_pro = mysqli_query($dbc, $get_pro);
				
				$i = 0;
				
				// Getting the values dynamically from the database
				while ($row_pro=mysqli_fetch_array($run_pro)) {
					
					$pho_id = $row_pro['photo_id'];
					$pho_title = $row_pro['photo_title'];
					$pho_image = $row_pro['photo_image'];
					$i++;
					
			?>
			
		<!-- Displaying into the table -->
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $pho_title; ?></td>
			<td><img class="img-item" src="../images/<?php echo $pho_image; ?>" width="100px" height="100px"></td>
			<td><a href="index.php?edit_pho=<?php echo $pho_id; ?>">Edit</a></td>
			<td><a href="delete_pho.php?delete_pho=<?php echo $pho_id; ?>">Delete</a></td>
		</tr>
		
		<?php } ?> <!-- Closing the While loop here! -->
	</table>
</body>

</html>

<?php } ?>