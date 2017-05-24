<!DOCTYPE>

<html>
<head>
	<title>PhotoGallery Insert Photos</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/style.css">
	
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif !important}
</style>

<body>
					  
	<!-- FORM FOR PUBLISHING PHOTOS -->
				    
	<div class="w3-container w3-blue h-margin">
		<h2>Publish Photo</h2>
	</div>
						
	<form action="publish_photo.php" method="post" enctype="multipart/form-data" class="w3-container form-bg">
		
		<p>
			<label><strong>Photo Title</strong></label>
			<input class="w3-input w3-border w3-round" type="text" name="photo_title" required>
		</p>
		
		<p>
			<label><strong>Photo Description</strong></label>
			<textarea class="w3-input w3-border w3-round" cols="20" rows="7" name="photo_desc"></textarea>
		</p>
		
		<p>
			<label><strong>Keywords</strong></label>
			<input class="w3-input w3-border w3-round" type="text" name="photo_keywords" required>
		</p>
		
		<p>
			<label><strong>Image</strong></label>
			<input class="w3-input w3-border w3-round" type="file" name="photo_image" required>
		</p>
		
		<p class="w3-center">
			<button type="submit" name="insert_post" class="w3-button w3-white w3-border"><strong>Publish</strong></button>
		</p>
	</form>
				    
	<!-- END FORM -->
	
</body>
</html>

				    <!-- Publishing photos (same like the one in the PhotoGallery page) from the Admin Panel -->
				    
						<?php
						
							require_once('dbinfo.php');
							
							// Connect to the database
							$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
						
							// Getting the data from the fields
							if(isset($_POST['insert_post'])) {
								$photo_title = $_POST['photo_title'];
								$photo_desc = $_POST['photo_desc'];
								$photo_keywords = $_POST['photo_keywords'];
								
								// Getting the image from the fields -> Getting the NAME of the image
								$photo_image = $_FILES['photo_image']['name'];
								$photo_image_tmp = $_FILES['photo_image']['tmp_name'];
								
								// Uploading the image into the images folder
								move_uploaded_file($photo_image_tmp, "../images/$photo_image");
								
								$publish_photo = "INSERT INTO gallery (photo_title, photo_desc, photo_image, photo_keywords) 
								VALUES ('$photo_title', '$photo_desc', '$photo_image', '$photo_keywords')";
								
								$insert_photo = mysqli_query($dbc, $publish_photo);
						
								
								// This is what happens when button is clicked
								if($insert_photo) {
									echo "<script>alert('Photo has been inserted!')</script>";
									echo "<script>window.open('index.php?insert_photo', '_self')</script>";
								}
							}
						?>
				    
				    <!-- END PHP -->