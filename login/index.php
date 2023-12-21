<?php



	?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>Hostify</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-slider.min.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/slick.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LfYXL0UAAAAAHq9lzqzIcKo2yljxixBuT9ofpwG"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LfYXL0UAAAAAHq9lzqzIcKo2yljxixBuT9ofpwG', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>

                    <?php // Check if form was submitted:
					$run="emtye";
					$eror="false";
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
                        // Build POST request:
                        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                        $recaptcha_secret = '6LfYXL0UAAAAAMlPzFiB1ruQeVYEHB00hi64Zbr2';
                        $recaptcha_response = $_POST['recaptcha_response'];
                        // Make and decode POST request:
                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                        $recaptcha = json_decode($recaptcha);
                        // Take action based on the score returned:
                        if ($recaptcha->score >= 0.5) {
                            // Verified - send email
						echo "ok";
						$run="true";
                        } else {
                            // Not verified - show form error
						echo "no";
						$run="flase";
                        }
                    } 
					if($run=="true")
					{
						session_start();
						$eror="false";
						if(isset($_SESSION["username"])){
						$ds=$_SESSION["username"];
						if($ds==1){
						header("Location: crud/index.php"); }
						}
						if(isset($_POST['username']))
						{
							include("../db.php");   
							$username=$_POST['username'];
							$password=$_POST['password'];
							echo $username.$password;
							$qaery= "SELECT * FROM login WHERE user = '". $username . "' AND pass = '". $password ."' ";
							$result=mysqli_query($conn,$qaery);
							$rows = mysqli_num_rows($result); 
							if($rows==1)
							{
								$_SESSION["username"] = 1;
								header("Location: crud/index.php");
								$run="emtye";
									 }else{
										 $eror="true";
								}
								}
												
											}
											else if($run=="false")
											{
												echo"you are spamer";
											}
											?>
<body class="fullpage">
<div id="form-section" class="container-fluid signin">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo" style="width:110px;height:110px"></div>
        </a>
    </div>
    <div class="row">
        <div class="info-slider-holder">
            <div class="bg-animation"></div>
            <div class="info-holder">
                <h6></h6>
                <div class="bold-title">خوش آمدید<br></div>
                <div class="mini-testimonials-slider">
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="../images/person1.png" alt="">
                            <h4>مدریت</h4>
                            <p>با وارد شدن  به پنل کاربری خود می توانید  لینک های خود را مدیرت کنید</p>
                        </div>
                    </div>
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="../images/person2.png" alt="">
                            <h4>ویرایش</h4>
                            <p>شما می توانید با استفاده از پنل کاربری خود اطلاعت ارتباطی خود را ویرایش کنید</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-holder">
            <div class="menu-holder">
                <ul class="main-links">
                  
                    <li><a class="sign-button" href="../index.php">خانه</a></li>
                </ul>
            </div>
            <div class="signin-signup-form">
                <div class="form-items">
				<center>
                    <div class="form-title">ورود به پنل کاربری</div>
                    <form action="" method="post" name="login" id="signinform">
                        <div class="form-text">
                            <input type="text" name="username" placeholder="نام کاربری یا ایمیل" required>
                        </div>
						</center>
                        <div class="form-text">
                            <input type="password" name="password" placeholder="رمز عبور" required>
							<?php
								if($eror=="true")
								{
											echo "<div class='form'>
	<br/><h3>نام کاربری یا رمز عبور شما اشتباه است</h3>";
								}
							?>
                        </div>
						
                        <div class="form-button">
						<center>
						</center>
                            <button id="submit" type="submit" class="ybtn ybtn-purple">ورود</button>
                        </div>
						 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-slider.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
