<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- External stylesheet reference -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- Google font CDN Integration -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">'

		<!-- bootstrap icons CDN -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

		<!-- Swiper JS CDN -->
		<link rel="stylesheet"  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

		<script> // to preview the profile pic when uploaded
		  var loadFile = function(event) {
		    var output = document.getElementById('output');
		    output.src = URL.createObjectURL(event.target.files[0]);
		    output.onload = function() {
		      URL.revokeObjectURL(output.src) // free memory
		    }
		  };
		</script>

		<script type="text/javascript">
			function SetDate()
			{
			var date = new Date();

			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();

			if (month < 10) month = "0" + month;
			if (day < 10) day = "0" + day;

			var today = year + "-" + month + "-" + day;

			document.getElementById('today').value = today;
			}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
		<script src="//geodata.solutions/includes/countrystatecity.js"></script>

    <title>MOLC</title>
  </head>
  <body onload="SetDate();">
    <!-- MOLC Brand Image starts here -->
    <!-- <div class="container">
    	<div class="brand-molc">
    		<img class="brand-molc-image" src="images/brand-molc.jpg">
    	</div>
    </div> -->
    <!-- MOLC Brand Image ends here -->

    <!-- Navigation bar starts here -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top center" style="background-color: white">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#"><img src="images/brand-molc.jpg" class="brand-molc-image"></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="nav navbar-nav navbar-center">
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" aria-current="page" href="../../" style="color: #b200e3;">HOME</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="../../curriculum/" style="color: #b200e3;">CURRICULUM</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="#" style="color: #b200e3;">LOGIN</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active nav-link-external-style" href="#" style="color: #b200e3;">ENROLL</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<!-- Navigation bar ends here -->

	<!-- enrollment form starts here -->
<div class="container" style="background-color: white;" data-aos="zoom-in">
		<div class="align-items-center" style="">
			<div class="enrollment-card">
			<form action="enroll_process.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="form-group">
							<!-- <label><b>Disciple's Details</b></label>	 -->
						</div>
						<div class="form-group">
							<!-- <label class="required">Name of Disciple</label> -->
							<input required="true" type="text" maxlength="20" name="name"  class="form-control" placeholder="Enter your name*">
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="male" id="male" value="male">
						  <label class="form-check-label" for="male">Male</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="female" id="female" value="female">
						  <label class="form-check-label" for="female">Female</label>
						</div>
						<div class="form-group">
							<!-- <label class="required">Date of Birth</label> -->
							<input placeholder="Enter the Date of Birth*" class="form-control" name="dob" required="true" type="text" onfocus="(this.type='date')" id="date">
						</div>
						<div class="form-group">
							<!-- <label class="required">Address</label> -->
							<input type="text" name="agejune" maxlength="80" required="true" class="form-control" placeholder="Age (as of 1st of June)">
						</div>
						<div class="form-group">
							<!-- <label class="required">Address</label> -->
							<input type="text" name="address" maxlength="80" required="true" class="form-control" placeholder="Enter your Address*">
						</div>
						<div class="form-group">
							<!-- <label>Name of School</label> -->
							<input type="text" name="school" maxlength="50" required="true" class="form-control" placeholder="Aadhar Number of the student">
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="form-group" class="image-justify">
							<img id="output" class="output" style="border: 1px solid black;" />
							<input type="file" style="display: none;" name="fileToUpload" onchange="loadFile(event)" id="fileToUpload" style="margin-top: 10px;">
							<p style="font-size: 12px; color: red;">(Size < 2MB, Formats: JPG, JPEG, and PNG)</p>
							<input type="button" value="Browse" style="margin-top: 20px; " onclick="document.getElementById('fileToUpload').click();" />
							<label class="required">Student's Photo</label>					
						</div>						
					</div>	
				</div>
				<!-- <div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="country" required="true" class="countries form-control" id="countryId">
							    <option value="">Select Country</option>
							</select>
						</div>						
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="state" required="true" class="states form-control" id="stateId">
							    <option value="">Select State</option>
							</select>
						</div>						
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="form-group">
							<select name="city" required="true" class="cities form-control" id="cityId">
							    <option value="">Select City</option>
							</select>
						</div>						
					</div>
				</div> -->
				<hr style="width: 70%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
						<div class="form-group" style="text-align: center;">
							<label><b>Father's Details</b></label>	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" maxlength="20" class="form-control" placeholder="Enter your Father's Name*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" maxlength="20" class="form-control" placeholder="Enter your Father's Education Qualification*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label>Occupation</label> -->
							<input type="text" name="focc" maxlength="20" class="form-control" placeholder="Enter your Father's Occupation*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" maxlength="20" class="form-control" placeholder="Enter your the name of the organization*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="Number" pattern="[789][0-9]{9}" name="fnum" class="form-control" placeholder="Enter your Father's Mobile Number*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="faddress" maxlength="20" class="form-control" placeholder="Enter your Father's Home Address*" required="true">	
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group" style="text-align: center;">
							<label><b>Mother's Details</b></label>	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="mname" maxlength="20" class="form-control" placeholder="Enter your Mother's Name*" required="true">
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" maxlength="20" class="form-control" placeholder="Enter your Mothers's Education Qualification*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label>Occupation</label> -->
							<input type="text" name="mocc" maxlength="20" class="form-control" placeholder="Enter your Mother's Occupation*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" class="form-control" placeholder="Enter your the name of the organization*" required="true">	
						</div>
						<div class="form-group">
							<!-- <label class="required">Contact Number</label> -->
							<input type="Number" name="mnum" pattern="[789][0-9]{9}" class="form-control" placeholder="Enter your Mother's Mobile Number*" required="true">	
						</div>	
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="maddress" class="form-control" placeholder="Enter your Mothers's Home Address*" required="true">	
						</div>					
					</div>
				</div>
				<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">

				<!-- <div class="form-group" style="text-align: center;">
					<label><b>Class Details</b></label>	
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="required">Preferred Class Type</label>
							<div class="radio">
							  <label><input type="radio" name="type" value="0" checked> In-Person (Attend classes in one of the centers)</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="type" value="1" > Online (Attend online classes remotely)</label>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label>Date of Application</label>
							<input type="Date" name="today" id="today" class="form-control" placeholder="Today's Date" readonly>	
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">						
						<div class="form-group">
							<label><b>Monthly Income of parents</b></label>	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="fname" class="form-control" placeholder="Father's Income" required="true">	
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<!-- <label class="required">Name</label> -->
							<input type="text" name="mname" class="form-control" placeholder="Mother's Income" required="true">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<!-- <label class="required">Name of Disciple</label> -->
							<input required="true" type="text" name="name"  class="form-control" placeholder="Nationality">
						</div>
						<div class="form-group">
							<!-- <label class="required">Address</label> -->
							<input type="text" name="address" required="true" class="form-control" placeholder="Religion">
						</div>
						</div>
					</div>
				<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label><b>Gaurdian Details</b></label>	
								</div>
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="mname" class="form-control" placeholder="Enter your Gaurdian's Name*" required="true">
								</div>
								<div class="form-group">
									<!-- <label class="required">Contact Number</label> -->
									<input type="Number" name="mnum" pattern="[789][0-9]{9}" class="form-control" placeholder="Enter your Gaurdian's Mobile Number*" required="true">	
								</div>	
								<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="fname" class="form-control" placeholder="Enter your Gaurdian's Home Address*" required="true">	
								</div>					
						</div>					
					</div>
				<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 2px solid black;">
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="resaddrparents" class="form-control" placeholder="Residential Address of Parents" required="true">
							</div>
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="schoollast" class="form-control" placeholder="Name of the school last studied" required="true">
							</div>
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="mtongue" class="form-control" placeholder="Mother tongue" required="true">
							</div>
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="childspecialneeds" class="form-control" placeholder="Child with special needs" required="true">
							</div>
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="bloodtype" class="form-control" placeholder="Blood Group of the Pupil" required="true">
							</div>
							<div class="form-group">
									<!-- <label class="required">Name</label> -->
									<input type="text" name="sibname" class="form-control" placeholder="Details of Sibilings" required="true">
							</div>
						</div>
					</div>
					</div>
				</div>
				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</div>	
			</form>
			</div>
		</div>
	</div>

	<!-- enrollment form ends here -->
	

	<!-- Contact Us starts here -->

	<div class="container">
		<div class="contact-us">
			<div class="about-us-header">
				<p class="about-us-border">Contact Us</p>
			</div>
			<div class="row top-margin">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
				<img src="images/molc-new-images/parallax-image-08.jpg" class="contact-us-image">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="contact-us-content">
						<div class="contact-us-content-heading">
							<p>Magizham Open Learning Community</p>
						</div>
						<div class="contact-us-content-info">
							<p class="address">No: 12, 13th cross, Lakshmi Nagar, Hosur - 635109</p>
							<p class="phone-number"><i class="bi bi-telephone"></i> (+91) 9944563085</p>
							<p class="phone-number"><i class="bi bi-telephone"></i> (+91) 9442469085</p>
							<p class="email"><i class="bi bi-envelope-open"></i> magizham2020@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Us ends here -->
	<!-- footer starts herer -->
<footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6 data-aos="zoom-out">About</h6>
              <p class="text-justify" data-aos="zoom-out">Magizham Open Learning Community had a humble beginning in 2014 with 10 pre primary children in Hosur. We progressed to aMontessori school in 2017 and started MOLC (Alternative Education) in 2020. Since then MOLC family is growing steadily with a strong team of teachers and enthusiastic children.</p>
            </div>

            <div class="col-xs-6 col-md-3">
            </div>

            <div class="col-xs-6 col-md-3">
              <h6 data-aos="zoom-out">Quick Links</h6>
              <ul class="footer-links">
                <li><a href="../../" data-aos="zoom-out">Home</a></li>
                <li><a href="../../curriculum/" data-aos="zoom-out">Curriculum</a></li>
                <li><a href="#gallery" data-aos="zoom-out">Login</a></li>
                <li><a href="#curriculum" data-aos="zoom-out">Enroll</a></li>
              </ul>
            </div>
          </div>
          <hr style="border-bottom: 3px solid #b200e3;">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by <a href="#">Magizham OLC</a>.
              </p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <p class="copyright-text">Powered by Tybon</a>.
              </p>
              </ul>
            </div>
          </div>
        </div>
  </footer>

	<!-- footer ends here -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
  </body>
</html>