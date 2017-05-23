
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
			  <a href="#" class="w3-bar-item w3-right w3-mobile links">
				<button onclick="document.getElementById('id02').style.display='block'" class="w3-button">Register</button>
			  </a>
			  <a href="#" class="w3-bar-item w3-right w3-mobile links">
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-button">Login</button>
			  </a>
			</div>
		  </div>
		  <!-- END Navigation -->
		  
		  <!-- START Login Modal-->
		  <div id="id01" class="w3-modal">
			<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">

			  <div class="w3-center"><br>
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright red-cross" title="Close Modal">&times;</span>
				<img src="images/img_avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
			  </div>

			  <form class="w3-container" method="post" action="index.php">
				<div class="w3-section">
				  <label><b>Username</b></label>
				  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
				  <label><b>Password</b></label>
				  <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
				  <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="loging-in" value="Login">
				  <input class="w3-check w3-margin-top" type="checkbox" checked="checked"><span class="dark">Remember me</span>
				</div>
			  </form>

			  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
			  </div>

			</div>
		  </div>
		  <!-- END Login Modal -->
		  
		  <!-- START Register Modal-->
		  <div id="id02" class="w3-modal">
			<div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">

			  <div class="w3-center"><br>
				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright red-cross" title="Close Modal">&times;</span>
				<img src="images/img_avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
			  </div>

			  <form class="w3-container" action="index.php" method="post">
				<div class="w3-section">
				  <label><b>Username</b></label>
				  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
				  <label><b>Email Address</b></label>
				  <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email Address" name="email" required>
				  <label><b>Password</b></label>
				  <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password1" required> <br>
				  <label><b>Re-type Password</b></label>
				  <input class="w3-input w3-border" type="password" placeholder="Re-type Password" name="password2" required>
				  <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="signing-up" value="Register"> <br>
				</div>
			  </form>

			  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
			  </div>

			</div>
		  </div>
		  <!-- END Register Modal -->
		  
		</div>
	</header>
	
	<!-- Displaying the details of a Single photo (title, the image, description, keywords) -->
	
	<div class="w3-col m12 l12 single-details">
			<?php
				
			// Getting the Product Id with the $_GET function in order to display information about 1 certain product only
			if(isset($_GET['photo_id'])) {
				$photo_id = $_GET['photo_id'];
			}
			$get_pro = "SELECT * FROM gallery WHERE photo_id='$photo_id'";
			
				$run_pro = mysqli_query($conn, $get_pro);
					
				// Fetching the data from the DB (without DESC and Keywords) because we dont need them on the first page of the website
				while ($row_pro = mysqli_fetch_array($run_pro)) {
					$photo_id = $row_pro['photo_id'];
					$photo_title = $row_pro['photo_title'];
					$photo_image = $row_pro['photo_image'];
					$photo_desc = $row_pro['photo_desc'];
					$photo_keywords = $row_pro['photo_keywords'];
					
					// Displaying the photo into specified places within the page
					echo "
						<div class='w3-col m12 l12 main-content'>
							<h3>$photo_title</h3>
							<img src='images/$photo_image' class='w3-animate-opacity img-item' width='1080' height='800'' />
							<p>
								<strong style='text-decoration: underline;'>Description </strong>
								<p>$photo_desc </p>
							</p>
							<p>
								<strong style='text-decoration: underline;'><p>Keywords</p></strong>
								<span>$photo_keywords </span>
							</p>
							<a href='index.php' style='float: center; font-size: 16px; text-decoration: underline;'>Back to Homepage</a> |
							<a href='gallery.php' style='float: center; font-size: 16px; text-decoration: underline;'>Back to Gallery</a>
						</div>
					";
				}
			?>
			
		</div>