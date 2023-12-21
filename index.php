<?php
if(is_null($_GET["send"])==false) {
    require('db.php');

//$url=mysqli_real_escape_string($conn,$_REQUEST['url']) ;

//mysql insert
    if (isset($_GET["send"]) && $_GET["send"] <= 9999 && is_numeric($_GET["send"])) {
        $url = mysqli_real_escape_string($conn, $_GET['send']);
        $insert = "select url from shorturl where id=" . $url;
        $result = mysqli_query($conn, $insert);
        if($result && mysqli_num_rows($result) > 0){
            $errors[] = "Username/Email is already registered";
            $row = $result->fetch_assoc();
            echo $row["url"];
            header("location:".$row["url"]);
            mysqli_close($conn);
        }
        else
        {
			
			header("location:https://mylo.ir/404.php");
            echo "eror 1";
        }

    } else {
		
			header("location:https://mylo.ir/404.php");
        echo "eror2";

    }
}
?>
<!doctype html>
<html>
<head>
 <link rel="shortcut icon" href="images/logo.png" title="Favicon" />
 <title>مایلو - کوتاه کننده لینک</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.min.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body  charset="UTF-8">
<div id="header-holder">
    <div class="bg-animation"></div>
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
    <div id="top-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div dir="rtl" class="big-title">لینک خود تو کوتاه کن!<br>
<span> رایگان </span>و بدون تبلیغات </div>
                    <div class="domain-search-holder">
                        <form action="server.php" method="post" id="domain-search">
                            <input dir="rtl" charset="UTF-8" id="domain-text" type="text" pattern="(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*)(?::\d{2,5})?(?:[\/?#]\S*)?" title="لینک را به درستی با http یا https وارد نمایید" name="url" placeholder="http://example.com" required />
                            <span class="inline-button">
                                <input dir="rtl" id="search-btn" type="submit" name="submit" value="کوتاه کن">
                            </span>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="arrow-button-holder">
                        <a href="#services">
                            <div class="button-text">اطلاعات بیشتر</div>
                            <div class="arrow-icon">
                                <i class="htfy htfy-arrow-down"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div dir="rtl" class="info-text">با استفاده از سامانه کوتاه کننده لینک مایلو می‌توانید به صورت رایگان و بدون تبلیغات لینک‌های طولانی را به لینک‌های کوتاه تبدیل کنید تا به راحتی و بهترین شکل از طریق پیامک، تلگرام و دیگر شبکه های اجتماعی به اشتراک بگذارید و باعث افزایش بازدید از مطب خود شوید</div>
                
                <a href="about.php" class="ybtn ybtn-purple ybtn-shadow">درباره مایلو</a>
            </div>
        </div>
    </div>
</div>
<div id="services" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div dir="rtl" class="row-title">ویژگی ها</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="images/service-icon1.png" alt="">
                    </div>
                    <div dir="rtl" class="service-title">رایگان</div>
                    <div dir="rtl" class="service-details">
                        <p> در مایلو شما می توانید بدون محدودیت و به صورت  رایگان لینک کوتاه کنید. " مایلو رایگان وبدون محدودیت"</p>
						</br>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="images/service-icon2.png" alt="">
                    </div>
                    <div dir="rtl" class="service-title">بدون تبلیغات</div>
                    <div dir="rtl" class="service-details">
                        <p>بر خلاف بسیاری از سرویس های کوتاه کننده لینک ،که حاوی تبلیغات بسیار و آزار دهنده می باشند مایلو بدون هیج تبلیغی لینک شما را کوتاه می کند .</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="images/service-icon3.png" alt="">
                    </div>
                    <div dir="rtl" class="service-title"> انقضا تا ابد!</div>
                    <div dir="rtl" class="service-details">
                        <p>تمامی لینک های ثبت شده در سایت به صورت دائمی بوده و هیچ یک از لینک ها از دسترس خارج نخواهد شد</p>
						</br>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="service-box">
                    <div class="service-icon">
                        <img src="images/service-icon4.png" alt="">
                    </div>
                    <div dir="rtl" class="service-title">پایداری و امنیت</div>
                    <div dir="rtl" class="service-details">
                        <p>جهت حفظ و نگهداری اطلاعات شما تمامی لینک های ثبت  شده در  mylo به صورت خصوصی بوده و به نمایش عموم در نخواهد آمد.</p>
						</br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
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
