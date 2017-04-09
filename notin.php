
	<header class="w3-container w3-teal">
		<div class="w3-row">
		  <div class="w3-col m6 l6">
		    <h1><span>Photo</span>Gallery</h1>
		  </div>
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
				<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" class="underline">password?</a></span>
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
				  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email Address" name="email" required>
				  <label><b>Password</b></label>
				  <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password1" required> <br>
				  <label><b>Re-type Password</b></label>
				  <input class="w3-input w3-border" type="password" placeholder="Re-type Password" name="password2" required>
				  <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="signing-up" value="Register"> <br>
				</div>
			  </form>

			  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
				<button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
				<span class="w3-right w3-padding w3-hide-small">Forgot <a href="#" class="underline">password?</a></span>
			  </div>

			</div>
		  </div>
		  <!-- END Register Modal -->
		  
		</div>
	</header>
	
	<div class="w3-row w3-container">
		<!-- Main Content -->
		<h1 class="main-title">Recent Photos</h1>
		
		<div class="w3-col m12 l12 main-content">
		   <div class="w3-row w3-container">
		   
		   	  <!-- First 3 images -->
			  <div class="w3-col m4 l4 pic">
			  	<a href="single.html">
			  		<img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			  	</a>
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			  <div class="w3-col m4 l4 pic">
			    <img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			  <div class="w3-col m4 l4 pic">
			    <img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			  
			  <!-- Second 3 images -->
			  <div class="w3-col m4 l4 pic">
			    <img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			  <div class="w3-col m4 l4 pic">
			    <img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			  <div class="w3-col m4 l4 pic">
			    <img src="http://placehold.it/400x200" class="w3-animate-opacity img-item">
			    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
			  </div>
			</div>
		</div> <!-- END Main Content -->
	</div>
	
	<footer>
		<p>PhotoGenik &copy; 2016</p>
	</footer>