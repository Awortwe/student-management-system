<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
		<label class="logo">W-School</label>

		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Admission</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>


	<div class="section1">
		
		<label class="img_text">We Teach Students With Care</label>
		<img class="main-img" src="images/school-image.jpg">
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome-img" src="images/school-image.jpg">
			</div>
			<div class="col-md-8">
				<h1>Welcome to W-School</h1>
				<p>MEMS has been committed to global learning long before it became an indispensable feature of contemporary 
                    education. Established in 1997, we proudly stand as the 1st English medium school in Bangladesh 
                    to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together students in 
                    a vibrant, academically challenging, and encouraging environment where manifold viewpoints are prized and 
                    celebrated.MEMS has been committed to global learning long before it became an indispensable feature of 
                    contemporary education. Established in 1997, we proudly stand as the 1st English medium school in 
                    Bangladesh to adopt both Pearson Edexcel and Cambridge curriculum (in O and A levels), drawing together 
                    students in a vibrant, academically challenging, and encouraging environment where manifold viewpoints are 
                    prized and celebrated.</p>
			</div>

		</div>
    </div>

    <center>
        <h1>Our Teachers </h1>   
    </center>
		
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="teacher-img" src="images/teacher1.jpg" alt="">
                    <p>At W-school, our teachers are more than educators, 
                        they are mentors, innovators, and lifelong learners dedicated to 
                        inspiring and guiding our 
                        students every step of the way. Each of our faculty members brings 
                        a unique background, 
                        a wealth of experience, 
                        and a commitment to creating an engaging and supportive learning environment.
                    </p>
                </div>

                <div class="col-md-4">
                    <img class="teacher-img" src="images/teacher2.jpg" alt="">
                    <p>At W-school, our teachers are more than educators, 
                        they are mentors, innovators, and lifelong learners dedicated to 
                        inspiring and guiding our 
                        students every step of the way. Each of our faculty members brings 
                        a unique background, 
                        a wealth of experience, 
                        and a commitment to creating an engaging and supportive learning environment.
                    </p>
                </div>

                <div class="col-md-4">
                    <img class="teacher-img" src="images/teacher3.jpg" alt="">
                    <p>At W-school, our teachers are more than educators, 
                        they are mentors, innovators, and lifelong learners dedicated to 
                        inspiring and guiding our 
                        students every step of the way. Each of our faculty members brings 
                        a unique background, 
                        a wealth of experience, 
                        and a commitment to creating an engaging and supportive learning environment.
                    </p>
                </div>
            </div>
        </div>

    <center>
        <h1>Our Courses </h1>   
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher-img" src="images/course1.jpg" alt="">
                    <h1>HTML CSS</h1>
            </div>
            <div class="col-md-4">
                <img class="teacher-img" src="images/course2.jpg" alt="">
                    <h1>JavaScript</h1>
            </div>
            <div class="col-md-4">
                <img class="teacher-img" src="images/course3.jpg" alt="">
                   <h1>Python</h1>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
    <form>
			
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="">
            </div>
    
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="">
            </div>
    
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt"></textarea>
            </div>
    
            <div class="adm_int" >
                
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" >
            </div>
    
    
    </form>
    </div>

    <footer>
        <h2 class="footer_text">All &copy; copyright reserved by W-school</h2>
    </footer>
</body>
</html>