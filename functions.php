<?php
	
	include("dbinfo.php");
	
	// DB Connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	if (mysqli_connect_error()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// Getting the products that we have listed from the DB + displaying them into the HTML pages
	function getPro() {
		
		GLOBAL $conn;
		
		// Displaying RANDOM 6 products from the DB
		$get_pro = "SELECT * FROM gallery ORDER BY RAND() LIMIT 0,6";
		
		$run_pro = mysqli_query($conn, $get_pro);
		
		// Fetching the data from the DB (without DESC and Keywords) because we dont need them on the first page of the website
		while ($row_pro = mysqli_fetch_array($run_pro)) {
			$photo_id = $row_pro['photo_id'];
			$photo_title = $row_pro['photo_title'];
			$photo_desc = $row_pro['photo_desc'];
			$photo_image = $row_pro['photo_image'];
			
			// Displaying the data from the DB into the specified places into the HTML pages
			echo "
				
				<div class='w3-col m4 l4 pic'>
					<a href='details.php?photo_id=$photo_id'>
						<img src='images/$photo_image' width='350' height='250'' class='w3-animate-opacity img-item'/>
					</a>
					<p class='description'>$photo_title</p>
					<!-- <a href='details.php?pro_id=$photo_id' style='float: center;'>Details</a> -->
				</div>
			";
		}
	}
	
	// Getting all the products from the DB to display them in Gallery page
	function getAll() {
		
		GLOBAL $conn;
		
		// Displaying all the products from the DB into the page
		$get_pro = "SELECT * FROM gallery";
		
		$run_pro = mysqli_query($conn, $get_pro);
		
		// Fetching the data from the DB (without DESC and Keywords) because we dont need them on the first page of the website
		while ($row_pro = mysqli_fetch_array($run_pro)) {
			$photo_id = $row_pro['photo_id'];
			$photo_title = $row_pro['photo_title'];
			$photo_desc = $row_pro['photo_desc'];
			$photo_image = $row_pro['photo_image'];
			
			// Displaying the data from the DB into the specified places into the HTML pages
			echo "
			
			<div class='w3-col m4 l4 pic'>
			<a href='details.php?photo_id=$photo_id'>
			<img src='images/$photo_image' width='350' height='250'' class='w3-animate-opacity img-item'/>
			</a>
			<p class='description'>$photo_title</p>
			<!-- <a href='details.php?pro_id=$photo_id' style='float: center;'>Details</a> -->
			</div>
			";
		}
	}
?>