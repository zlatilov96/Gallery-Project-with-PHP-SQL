
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
			  <a href="logout.php" class="w3-button w3-bar-item w3-right w3-mobile links">Logout</a>
			  <a href="publish_photo.php" class="w3-bar-item w3-right w3-mobile links">
				<button onclick="document.getElementById('id01').style.display='block'" class="w3-button">Publish Photo</button>
			  </a>
			</div>
		  </div>
		</div>
	</header>
	
	<div class="w3-row w3-container">
		<!-- Main Content -->
		<h1 class="main-title">Contact Us</h1>
		
		
		<div class="w3-col form-content">
		   <div class="w3-row w3-container">
		   
		   	  <!-- CONTACT FORM STARTS HERE -->
					  
				<div class="w3-row">
				  <div class="w3-quarter w3-container">
				  </div>
				  <div class="w3-half w3-container">
				    
				    <div class="contact-info">
				    	<p>Whether you are looking for answers, would like to solve a problem, or just want to let us know how we did, you will find many ways to contact us right here. We will help you resolve your issues quickly and easily. <strong>Do not hesitate to contact us!</strong></p>
				    	
				    	<!-- FORM -->
				    
				    	<form action="/action_page.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin contact-form">
							<h2 class="w3-center">Contact Form</h2>
							 
							<div class="w3-row w3-section">
							  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
							    <div class="w3-rest">
							      <input class="w3-input w3-border" name="first" type="text" placeholder="Your Name">
							    </div>
							</div>
							
							<div class="w3-row w3-section">
							  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-comment"></i></div>
							    <div class="w3-rest">
							      <input class="w3-input w3-border" name="last" type="text" placeholder="Topic">
							    </div>
							</div>
							
							<div class="w3-row w3-section">
							  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
							    <div class="w3-rest">
							      <input class="w3-input w3-border" name="email" type="text" placeholder="Your Email">
							    </div>
							</div>
							
							<div class="w3-row w3-section">
							  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
							    <div class="w3-rest">
							      <input class="w3-input w3-border" name="message" type="text" placeholder="Message">
							    </div>
							</div>
							
							<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>
							
							</form>
					    
					    <!-- END FORM -->
				    	
				    	<div class="w3-container" style="text-align:center">
				          <hr>
				          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>PhotoGallery</p>
				          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
				          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>gallery@mail.com</p>
				          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>0123-456-789</p>
				          <hr>
				          
				          <h3 class="title"><strong>Location</strong></h3>
				          <!-- Add Google Maps -->
      					  <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:300px;"></div>
				        </div>
				    </div>
				    
				  </div>
				  <div class="w3-quarter w3-container">
				  </div>
				</div>
		   	  
		   	  <!-- CONTACT FORM ENDS HERE -->
			  
			</div>
		</div> <!-- END Main Content -->
	</div>
	
	<!-- Add Google Maps -->
	<script>
	function myMap()
	{
	  myCenter=new google.maps.LatLng(51.509865, -0.118092);
	  var mapOptions= {
	    center:myCenter,
	    zoom:12, scrollwheel: false, draggable: false,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);
	
	  var marker = new google.maps.Marker({
	    position: myCenter,
	  });
	  marker.setMap(map);
	}
	</script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdEISbrk-_X40SXh2xmqXLr_pKuZrjtjM&callback=myMap"></script>
	
	<footer>
		<p>PhotoGenik &copy; 2016</p>
	</footer>