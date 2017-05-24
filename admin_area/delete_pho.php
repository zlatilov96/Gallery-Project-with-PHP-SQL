<?php
	
	// When "Delete" button is clicked, the photo is deleted from the DB
	include("dbinfo.php");
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Button is being clicked, and the product is being deleted
	if(isset($_GET['delete_pho'])) {
		
		$delete_id = $_GET['delete_pho'];
		
		$delete_pho = "DELETE FROM gallery WHERE photo_id='$delete_id'";
		
		$run_delete = mysqli_query($dbc, $delete_pho);
		
		// If everything is okay, a message is displayed to the admin
		if($run_delete) {
			echo "<script>alert('The photo was successfully deleted!')</script>";
			echo "<script>window.open('index.php?view_photos','_self')</script>";
		}
	}
?>