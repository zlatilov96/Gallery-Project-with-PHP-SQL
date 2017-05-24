<?php 

	// When "Delete" button is clicked in the "View Users" page, it deletes the certain user from the DB
	include("dbinfo.php");
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Delete button is being clicked, and the following code activated
	if(isset($_GET['delete_c'])) {
		
		$delete_id = $_GET['delete_c'];
		
		$delete_c = "DELETE FROM user WHERE userid='$delete_id'";
		
		$run_delete = mysqli_query($dbc, $delete_c);
		
		// When everything is okay, a message is displayed to the admin
		if($run_delete) {
			echo "<script>alert('The user has been successfully deleted!')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
	}
?>