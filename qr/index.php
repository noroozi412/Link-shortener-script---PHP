<!DOCTYPE html>
<html>
<head>
<title>basic example</title>
</head>
<body>
<script src="jquery.min.js"></script>

<!--<script type="text/javascript" src="../jquery.qrcode.min.js"></script>
--><script type="text/javascript" src="jquery.qrcode.js"></script>
<script type="text/javascript" src="qrcode.js"></script>

<p>Render in table</p>
<div id="qrcodeTable"></div>
<p>Render in canvas</p>
<div id="qrcodeCanvas"></div>
<script>
	//jQuery('#qrcode').qrcode("this plugin is great");
	jQuery('#qrcodeTable').qrcode({
		render	: "table",
		text	: "http://google.com"
	});	
	jQuery('#qrcodeCanvas').qrcode({
		text	: "http://google.com"
	});	
</script>

</body>
</html>
