
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="images/logo.png" title="Favicon" />
 <title>مایلو - کوتاه کننده لینک</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body dir="rtl">

    <script src="jquery.min.js"></script>

    <!--<script type="text/javascript" src="../jquery.qrcode.min.js"></script>
    --><script type="text/javascript" src="jquery.qrcode.js"></script>
    <script type="text/javascript" src="qrcode.js"></script>
<div id="header-holder" class="inner-header contact-header">
        <nav id="nav" class="navbar navbar-default navbar-full">
        <div class="container-fluid">
            <div class="container container-nav">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo-holder" href="index.html">
                                <div class="logo" style="width:120px;height:120px"></div>
                            </a>
                        </div>
                        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
                            <ul class="nav navbar-nav navbar-right">
                                
                                </li>
								<li><a class="login-button" href="faq.php">قوانین و تماس باما</a></li>
                                <li><a class="login-button" href="about.php">درباره ما</a></li>
                                <li dir="rtl" class="support-button-holder support-dropdown">
                                    <li><a class="login-button" href="index.php">خانه</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="page-head" class="container-fluid inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="page-title">لینک شما کوتاه شد</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text">
					<?php
					//mysql information
require('db.php');

$url=mysqli_real_escape_string($conn,$_REQUEST['url']) ;
$scam ="https://mylo.ir/404.php";
if(strpos($url,'shaparak') !== false ) 
{header("Location: $scam");}
else if(strpos($url,'Shaparak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'shaaparak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'view.genial') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'app.funnel') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'Shaaparak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'shaparaak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'Shaparaak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'.ga') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'.tk') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'shapaarak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'Shapaarak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'Mellat') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'.ly') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'https://bit') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'http://bit') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'t.co') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'shaperak') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'.ml') !== false)
{
header("Location: $scam");
}
else if(strpos($url,'.apk') !== false)
{
header("Location: $scam");
}
else
{
$select="select url from shorturl where url='$url'";
$result = mysqli_query($conn, $select);
if($result && mysqli_num_rows($result) > 0){
$errors[] = "Username/Email is already registered";

    $selectshorturl = "select shorturl from shorturl where url='$url'";
    $run=mysqli_query($conn,$selectshorturl);
    $row = $run->fetch_assoc();
  $go=$row["shorturl"];
            print ("<a href='$go' >$go</a>");
    $newurl=$row["shorturl"];
    mysqli_close($conn);
}
					else{

//mysql insert
$insert="insert into shorturl(url,shorturl,user) values('$url','null','admin')";
mysqli_query($conn,$insert);

//mysql update
$last_id = $conn->insert_id;
$newurl=$_SERVER['HTTP_HOST']."/".$last_id;

//echo "New record created successfully. Last inserted ID is: " .$newurl ;
$upadte="update shorturl set shorturl='$newurl' where id='$last_id' ";
mysqli_query($conn,$upadte);

//mysql close
mysqli_close($conn);

//return to home page
//*if (isset($url))
/**{
header("location:index.php?send=".$newurl."&"."url=".$url);
}**/
        if(isset($newurl)){
            $go="http://".$newurl;
            print ("<a href='$go'>$go</a>");
}}}
					?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="contact-info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">

    <p>کد QR  لینک کوتاه شده</p>
    <div id="qrcodeCanvas"></div>
    <script>
      
        jQuery('#qrcodeCanvas').qrcode({
            text	: "<?php echo $newurl ?>"
        });
    </script>
				
				</div>
            </div>
			<center><h1>به اشتراک گذاری</h1></center>
        </div>
		
        <div class="ro8w">
            <div class="col-md-4">
                <div class="info-box">
                    <div>
						<center>
							<a href="https://telegram.me/share/url?url=<?php echo $go; ?>">
								<image width="30%" height="30%" src="images\t_logo.png"  >
								</image>
							</a>
						</center>
					</div>
				</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="info-title ch4at-icon"><div>
						<center>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $go; ?>">
								<image width="30%" height="30%" src="images\facebook.png"  >
								</image>
							</a>
						</center>
					</div></div>
                    <div class="info-details"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="info-title locat.ion-icon"><div>
						<center>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $go; ?>">
								<image width="30%" height="30%" src="images\linkdin.png"  >
								</image>
							</a>
						</center>
					</div></div>
                    <div class="info-details"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="container-fluid">
    <div class="container">
        <div class="row">
           <h4 color="withe">کلیه حقوق این وب سایت متعلق به پندارفن می باشد © l 1400 </h4>
		   <a href="https://pendarfan.ir"><h4>پندار فن</h4>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
