<?php 
	// Check if the user who tries to access is logged in with admin username.
	// If not, redirect to index.php because he should have access to enter this page.
	if(!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!' , '_self')</script>";
	}
	
	// Else show the page. Closing bracket for else statement is at the very bottom of the page.
	else {
?>

<!DOCTYPE>

<?php
	
	// When "Edit" button is clicked, the data for each product is displayed into the input forms
	// and it is ready to be editted
	if(isset($_GET['edit_pho'])) {
		$get_id = $_GET['edit_pho'];
		
		$get_pho = "SELECT * FROM gallery WHERE photo_id='$get_id'";
		
		$run_pho = mysqli_query($dbc, $get_pho);
		
		$i = 0;
		
		// Getting the values dynamically from the database
		$row_pho=mysqli_fetch_array($run_pho);
			
			$pho_id = $row_pho['photo_id'];
			$pho_title = $row_pho['photo_title'];
			$pho_image = $row_pho['photo_image'];
			$pho_desc = $row_pho['photo_desc'];
			$pho_keywords = $row_pho['photo_keywords'];
			
	}
?>

<html>
<head>
	<title>Update Photo</title>
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
	
	<!-- EDIT / UPDATE PHOTO FORM -->
				    
	<div class="w3-container w3-blue h-margin">
		<h2>Edit / Update Photo</h2>
	</div>
						
	<form action="" method="post" enctype="multipart/form-data" class="w3-container form-bg">
		
		<p>
			<label><strong>Photo Title</strong></label>
			<input class="w3-input w3-border w3-round" type="text" name="photo_title" required value="<?php echo $pho_title ?>"/>
		</p>
		
		<p>
			<label><strong>Photo Description</strong></label>
			<textarea class="w3-input w3-border w3-round" name="photo_desc" cols="20" rows="10"><?php echo $pho_desc ?></textarea>
		</p>
		
		<p>
			<label><strong>Keywords</strong></label>
			<input class="w3-input w3-border w3-round" type="text" name="photo_keywords" required size="80" value="<?php echo $pho_keywords ?>" />

		</p>
		
		<p>
			<label><strong>Image</strong></label>
			<input class="w3-input w3-border w3-round" type="file" required name="photo_image"/><img src="../images/<?php echo $pho_image; ?>" width="160px" height="160px">
		</p>

		<p class="w3-center">
			<button type="submit" name="update_photo" class="w3-button w3-white w3-border"><strong>Update Photo</strong></button>
		</p>
	</form>
</body>
</html>

<?php
	
	// Getting the text data from the fields
	// When "Update" button is clicked, all the new data that the admin has written is being updated
	// and new data is inserted into the DB
	
	if(isset($_POST['update_photo'])) {
		
		$update_id = $pho_id;
		
		$photo_title = $_POST['photo_title'];
		$photo_desc = $_POST['photo_desc'];
		$photo_keywords = $_POST['photo_keywords'];
		
		// Getting the image from the fields -> We specify that we want to get the NAME of the image.
		$photo_image = $_FILES['photo_image']['name'];
		$photo_image_tmp = $_FILES['photo_image']['tmp_name'];
		
		// Uploading the image into the folder in Admin Area
		move_uploaded_file($photo_image_tmp, "../images/$photo_image");
		
		$update_photo= "UPDATE gallery SET photo_title='$photo_title', photo_desc='$photo_desc', 
		photo_image='$photo_image', photo_keywords='$photo_keywords' WHERE photo_id='$update_id'";
		
		$run_photo= mysqli_query($dbc, $update_photo);
		
		// When everything is okay, an alert message is displayed to the admin
		if($run_photo) {
			echo "<script>alert('Photo has been updated!')</script>";
			echo "<script>window.open('index.php?view_photos', '_self')</script>";
		}
	}

?>

<?php } ?>