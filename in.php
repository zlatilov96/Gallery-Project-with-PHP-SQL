
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
		<h1 class="main-title">Random Photos</h1>
		
		<div class="w3-col m12 l12 main-content">
		   <div class="w3-row w3-container">
		   
		   		<!-- Getting the products from the database and displaying them into the front page. -->
		   		<!-- function getPro() is located into the functions.php file -->
		  		<?php getPro(); ?>

			</div>
		</div> <!-- END Main Content -->
	</div>
	
	<footer>
		<p>PhotoGallery &copy; 2017</p>
	</footer>