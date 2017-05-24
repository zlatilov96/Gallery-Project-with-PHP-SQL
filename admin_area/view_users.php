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
	<title>PhotoGallery View Users</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
	
<body>
	
	<!-- Displaying all the users into a table (username, email, etc.) -->
	<table id="view_customers">
		<tr align="center">
			<td colspan="6"><h2>View All Users</h2></td>
		</tr>
		<tr align="center">
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Delete</th>
		</tr>
		
			<?php 

				// Getting all the data from the "user" table in the database in order to display
				// all the users into the HTML table
			
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				
				$get_c = "SELECT * FROM user";
				
				$run_c = mysqli_query($dbc, $get_c);
				
				$i = 0;
				
				// Getting the values dynamically from the database
				while ($row_c=mysqli_fetch_array($run_c)) {
					
					$c_id = $row_c['userid'];
					$c_name = $row_c['username'];
					$c_email = $row_c['email'];
					$i++;
					
			?>
			
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $c_name; ?></td>
			<td><?php echo $c_email; ?></td>
			<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
		</tr>
		
		<?php } ?> <!-- Closing the While loop here! -->
	</table>
</body>

</html>

<?php } ?>