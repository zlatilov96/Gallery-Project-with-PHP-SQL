<?php 
	session_start();
	
	// Check if the user who tries to access is logged in with his ADMIN email.
	// If not, redirect to index.php because he should have access to enter this page.
	if(!isset($_SESSION['user_email'])) {
		echo "<script>window.open('login.php?not_admin=You are not an Admin!' , '_self')</script>";
	} 
	
	// Else show the page. Closing bracket for else statement is at the very bottom of the page.
	else {
		
?>

<!DOCTYPE html>
<html>
<title>PhotoGallery Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles/style.css">
<style>
body{font-weight:bold;}
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey; font-weight: bold !important;">

<!-- Top container -->
<div class="w3-bar w3-top panel-c w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu</button>
  <span class="w3-bar-item w3-right">Admin Panel</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/avatar.png" class="w3-circle w3-margin-right" style="width:40px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $_SESSION['user_email']; ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  
  <!-- Navigation Links-->
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i> Home</a>
    <a href="index.php?insert_photo" class="w3-bar-item w3-button w3-padding"><i class="fa fa-upload fa-fw"></i> Publish Photo</a>
    <a href="index.php?view_photos" class="w3-bar-item w3-button w3-padding"><i class="fa fa-picture-o fa-fw"></i> View Photos</a>
    <a href="index.php?view_users" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> View Users</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
  </div>
  <!-- END Navigation Links -->
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Admin Area</b></h5>
  </header>
  
  <!-- Getting the data for the 2 boxes below from the DB -->
  <?php 
  	  // All Photos
	  include("dbinfo.php");
	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	  $query_photos = "SELECT * FROM gallery";
	  $result_photos = mysqli_query($dbc, $query_photos);
	  $count_photos = mysqli_num_rows($result_photos);
	  
	  // All Users
	  $query_users = "SELECT * FROM user";
	  $result_users = mysqli_query($dbc, $query_users);
	  $count_users = mysqli_num_rows($result_users);
  ?>
	
  <!-- Inserting the data into the Blue and the Red box -->
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-half">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-picture-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $count_photos; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Photos</h4>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-container w3-blue w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $count_users; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>
  
  <!-- Main Area -->
  <div class="w3-container">
    <div class="w3-row">
      <div class="w3-col m12 w3-container">
		<div id="left">
			
			<!-- All the directories displayed in the Admin Panel -->
			<?php
			
				if(isset($_GET['insert_photo'])){
					echo "<br>";
					include('publish_photo.php');
					echo "<br>";
				}
				
				if(isset($_GET['view_photos'])){
					include('view_photos.php');
					echo "<br>";
				}
				
				if(isset($_GET['edit_pho'])){
					include('edit_pho.php');
				}
				
				if(isset($_GET['view_users'])){
					include('view_users.php');
				}
			?>
			
		</div>
      </div>
    </div>

  <!-- End page content -->
</div>

</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>

<?php } ?>