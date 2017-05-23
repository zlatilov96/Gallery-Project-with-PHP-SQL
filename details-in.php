<?php
  include("loginfile.php");
  include("signupfile.php");
  
  
  /* If the session data does not exist (i.e we are starting a new session), try to set the session's data with 
     the cookies that were saved when the user made his/her last login (i.e: the cookies that the client browser is sending in its HTTP GET request to this index.php script)
     This is the code that allows the app to remember the user that last logged in to the app (in the browser/computer that's issuing the HTTP GET request) and left the app without logging out 
  */
  if (!isset($_SESSION['userid'])) {
    if (isset($_COOKIE['userid']) && isset($_COOKIE['username'])) {
      $_SESSION['userid'] = $_COOKIE['userid'];
      $_SESSION['username'] = $_COOKIE['username'];
      // Using city here is for demonstration purposes. In real applications, you should not save personal data in cookies
      $_SESSION['email'] = $_COOKIE['email']; 
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>PhotoGallery</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

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
		
</body>
</html>
