
	<header class="w3-container w3-teal">
		<div class="w3-row">
		  <div class="w3-col m6 l6">
		    <h1><span>Photo</span>Gallery</h1>
		  </div>
		  
		  <!-- Navigation -->
		  <div class="w3-col m6 l6">
		    <div class="w3-bar-item nav-menu links w3-right">
			  <a href="index.php" class="w3-bar-item w3-button w3-mobile">Home</a>
			  <a href="gallery.php" class="w3-bar-item w3-button w3-mobile">Gallery</a>
			  <a href="contact.php" class="w3-bar-item w3-button w3-mobile">Contact Us</a>
			  <a href="logout.php" class="w3-button w3-bar-item w3-right w3-mobile links">Logout</a>
			  <a href="publish_photo.php" class="w3-bar-item w3-right w3-mobile links">
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-button">Publish Photo</button>
			  </a>
			</div>
		  </div>
		  <!-- END Navigation -->
		</div>
	</header>
	
	<div class="w3-row w3-container">
		<!-- Main Content -->
		<h1 class="main-title">Publish Photo</h1>
		
		
		<div class="w3-col form-content">
		   <div class="w3-row w3-container">
		   
		   	  <!-- PUBLISHING FORM STARTS HERE -->
					  
				<div class="w3-row">
				  <div class="w3-quarter w3-container">
				  </div>
				  <div class="w3-half w3-container">
				    
				    <div class="publish-info">
				    	<p>Have you ever visited a place that you want to tell the whole world about? <br> Now you have the chance to do that! <strong>Publish an awesome photo!</strong></p>
				    	<p>Whether you are looking for answers, would like to solve a problem, or just want to let us know how we did, you will find many ways to contact us right here. We will help you resolve your issues quickly and easily. <strong>Do not hesitate to contact us!</strong></p>
				    </div>
				    
				    <!-- FORM -->
				    
				    	<div class="w3-container w3-blue h-margin item-shadow">
						  <h2>Input Form</h2>
						</div>
						
				    	<form action="publish_photo.php" method="post" enctype="multipart/form-data" class="w3-container form-bg item-shadow">
						  <p>
						  <label><strong>Title</strong></label>
						  <input class="w3-input w3-border w3-round" type="text" name="photo_title" required></p>
						  <p>
						  <label><strong>Description</strong></label>
						  <textarea class="w3-input w3-border w3-round" cols="20" rows="7" name="photo_desc"></textarea></p>
						  <p>
						  <label><strong>Keywords</strong></label>
						  <input class="w3-input w3-border w3-round" type="text" name="photo_keywords" required></p>
						  <p>
						  <label><strong>Image</strong></label>
						  <input class="w3-input w3-border w3-round" type="file" name="photo_image" required></p>
						  <p class="w3-center">
						  	<button type="submit" name="insert_post" class="w3-button w3-white w3-border"><strong>Publish</strong></button>
						  </p>
						  
						</form>
				    
				    <!-- END FORM -->
				    
				    <!-- Getting the data the user has inputted into the form and saves it into the DB -->
				    
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
								move_uploaded_file($photo_image_tmp, "images/$photo_image");
								
								// Inserting the data into the database
								$publish_photo = "INSERT INTO gallery (photo_title, photo_desc, photo_image, photo_keywords) 
								VALUES ('$photo_title', '$photo_desc', '$photo_image', '$photo_keywords')";
								
								$insert_photo = mysqli_query($dbc, $publish_photo);
						
								// When insert button is clicked and everything is fine, an alert message is displayed
								if($insert_photo) {
									echo "<script>alert('Photo was successfully published!')</script>";
									echo "<script>window.open('publish_photo.php', '_self')</script>";
								}
							}
						?>
				    
				    <!-- END PHP -->
				  </div>
				  <div class="w3-quarter w3-container">
				  </div>
				</div>
		   	  
		   	  <!-- CONTACT FORM ENDS HERE -->
			  
			</div>
		</div> <!-- END Main Content -->
	</div>
	
	<footer>
		<p>PhotoGallery &copy; 2017</p>
	</footer>